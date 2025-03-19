$(document).ready(function () {
    var csrfToken = $('input[name="_token"]').val();
    var table = $('#table').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'POST',
        "pagingType": "listbox",
        "autoWidth": false,
        dom: "<'row'<'col-sm-3'><'col-sm-6'><'col-sm-3'>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-1><'col-sm-9><'col-sm-1'>>",
        'ajax': {
            'url': baseUrl + '/backoffice/attribute-value/datatable',
            'data': function (data) {
                data._token = csrfToken;
            }
        },
        'columns': [
            {data: 'id'},
            {data: 'name'},
            {data: 'status'},
            {data: 'actions'}
        ],

    });
    $('#globalSearch').on('keyup', function () {
        table.search(this.value).draw();
    });
});

function handleFormSubmit(url, formName,buttonName) {
    var formData = new FormData(document.getElementById(formName));
    let buttonNameId = '#'+buttonName;

    $(buttonNameId).prop('disabled', true);
    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.message) {
                toastr.success(response.message);
                setTimeout(() => location.reload(), 2000);
            }
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                $.each(xhr.responseJSON.errors, (_, errorMessages) => {
                    errorMessages.forEach(errorMessage => toastr.warning(errorMessage));
                });
            } else {
                toastr.warning('Sistem hatası meydana geldi.');
            }
        },
        complete: function () {

            $(buttonNameId).prop('disabled', false);
        }
    });
}

function createForm() {
    handleFormSubmit(baseUrl + '/backoffice/attribute-value', 'attributeValueForm','attributeValueFormButton');
}

function updateForm() {
    var id = $('#id').val();
    handleFormSubmit(baseUrl + '/backoffice/attribute-value/' + id, 'attributeValueFormUpdate','attributeValueUpdateFormButton');
}

function openAttributeValueModal(id) {
    fetch(baseUrl+`/backoffice/attribute-value/${id}`)
        .then(response => response.json())
        .then(info => {
            if (typeof info !== 'undefined' && info.length > 0) {
                let attributeValue = info[0];

                document.getElementById('id').value = attributeValue.id;
                document.getElementById('attribute_id').value = attributeValue.attribute_id;
                document.getElementById('extra').value = attributeValue.extra;
                document.getElementById('up-display_order').value = attributeValue.display_order;
                document.getElementById('up-status').checked = attributeValue.status === 1;

                if (attributeValue.web_translations && attributeValue.web_translations.length > 0) {
                    attributeValue.web_translations.forEach(translation => {
                        let lang = translation.language_code.toLowerCase();

                        if (document.getElementById(`up-${lang}_name`)) {
                            document.getElementById(`up-${lang}_name`).value = translation.name;
                            document.getElementById(`up-${lang}_slug`).value = translation.slug;
                            document.getElementById(`up-${lang}_meta_title`).value = translation.meta_title;
                            document.getElementById(`up-${lang}_meta_keywords`).value = translation.meta_keywords;
                            document.getElementById(`up-${lang}_meta_description`).value = translation.meta_description;
                            document.getElementById(`up-${lang}_short_description`).value = translation.short_description ?? '';
                            document.getElementById(`up-${lang}_description`).value = translation.description ?? '';

                        }
                    });
                }
                let modal = new bootstrap.Offcanvas(document.getElementById('update-attributeValue-modal'));
                modal.show();
            }
        })
        .catch(error => console.error('Hata:', error));
}

function attributeValueDelete(id) {
    Swal.fire({
        title: "Silmek İstiyor musunuz?",
        text: "Yapılan işlemi geri alamazsınız!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'EVET'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: baseUrl + '/backoffice/attribute-value/' + id,
                data: {
                    _token: $("#_token").val()
                },
                success: function (data) {
                    Swal.fire(
                        'Başarılı!',
                        data.message,
                        'success'
                    );
                    setTimeout(() => location.reload(), 2000);
                },
                error: function (data) {
                    Swal.fire(
                        'Hata!',
                        'Sistem Hatası',
                        'error'
                    );
                }
            });
        }
    });
}
