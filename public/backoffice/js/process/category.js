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
            'url': baseUrl + '/backoffice/category/datatable',
            'data': function (data) {
                data._token = csrfToken;
            }
        },
        'columns': [
            {data: 'id'},
            {data: 'name'},
            {data: 'slug'},
            {data: 'status'},
            {data: 'actions'}
        ],

    });
    $('#globalSearch').on('keyup', function () {
        table.search(this.value).draw();
    });
});

function handleFormSubmit(url, method) {
    var formData = new FormData(document.getElementById('categoryForm'));

    ['tr', 'en'].forEach(lang => {
        if (CKEDITOR.instances[`${lang}_description`]) {
            formData.append(`${lang}_description`, CKEDITOR.instances[`${lang}_description`].getData());
        }
    });
    $('#categoryFormButton').prop('disabled', true);
    $.ajax({
        type: method,
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
            $('#categoryFormButton').prop('disabled', false);
        }
    });
}

function createForm() {
    handleFormSubmit(baseUrl + '/backoffice/category', 'POST');
}

function updateForm() {
    var id = $('#id').val();
    handleFormSubmit(baseUrl + '/backoffice/category/' + id, 'POST');
}

document.addEventListener("DOMContentLoaded", function () {
    if (typeof info !== 'undefined' && info.length > 0) {
        let category = info[0];

        document.getElementById('display_order').value = category.display_order;
        document.getElementById('parent_id').value = category.parent_id;
        document.getElementById('status').checked = category.status === 1;

        if (category.web_translations && category.web_translations.length > 0) {
            category.web_translations.forEach(translation => {
                let lang = translation.language_code.toLowerCase();

                if (document.getElementById(`${lang}_name`)) {
                    document.getElementById(`${lang}_name`).value = translation.name;
                    document.getElementById(`${lang}_slug`).value = translation.slug;
                    document.getElementById(`${lang}_meta_title`).value = translation.meta_title;
                    document.getElementById(`${lang}_meta_keywords`).value = translation.meta_keywords;
                    document.getElementById(`${lang}_meta_description`).value = translation.meta_description;
                    document.getElementById(`${lang}_short_description`).value = translation.short_description ?? '';

                    if (CKEDITOR.instances[`${lang}_description`]) {
                        CKEDITOR.instances[`${lang}_description`].setData(translation.description);
                    }
                }
            });
        }
    }
});
function categoryDelete(id) {
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
                url: baseUrl + '/backoffice/category/' + id,
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
