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
            'url': baseUrl + '/backoffice/product/datatable',
            'data': function (data) {
                data._token = csrfToken;
            }
        },
        'columns': [
            {data: 'id'},
            {data: 'name'},
            {data: 'slug'},
            {data: 'brand'},
            {data: 'category'},
            {data: 'stock'},
            {data: 'status'},
            {data: 'actions'}
        ],

    });
    $('#globalSearch').on('keyup', function () {
        table.search(this.value).draw();
    });
});

function handleFormSubmit(url, method) {
    var formData = new FormData(document.getElementById('productForm'));

    ['tr', 'en'].forEach(lang => {
        if (CKEDITOR.instances[`${lang}_description`]) {
            formData.append(`${lang}_description`, CKEDITOR.instances[`${lang}_description`].getData());
        }
    });
    $('#productFormButton').prop('disabled', true);
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
            $('#productFormButton').prop('disabled', false);
        }
    });
}

function createForm() {
    handleFormSubmit(baseUrl + '/backoffice/product', 'POST');
}

function updateForm() {
    var id = $('#id').val();
    handleFormSubmit(baseUrl + '/backoffice/product/' + id, 'POST');
}

document.addEventListener("DOMContentLoaded", function () {
    if (typeof info !== 'undefined' && info.length > 0) {
        let product = info[0];

        document.getElementById('display_order').value = product.display_order;
        document.getElementById('category_id').value = product.category_id;
        document.getElementById('stock').value = product.stock;
        document.getElementById('status').checked = product.status === 1;

        if (product.web_translations && product.web_translations.length > 0) {
            product.web_translations.forEach(translation => {
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
function productDelete(id) {
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
                url: baseUrl + '/backoffice/product/' + id,
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

document.addEventListener("DOMContentLoaded", function () {
    if (typeof info !== 'undefined' && info.length > 0) {
        let product = info[0];

        document.getElementById('display_order').value = product.display_order;
        document.getElementById('category_id').value = product.category_id;
        document.getElementById('brand_id').value = product.brand_id;
        document.getElementById('stock').value = product.stock;
        document.getElementById('status').checked = product.status === 1;

        if (product.web_translations && product.web_translations.length > 0) {
            product.web_translations.forEach(translation => {
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

        if (product.prices && product.prices.length > 0) {
            product.prices.forEach(price => {
                let lang = price.currency.toLowerCase();

                if (document.getElementById(`${lang}_price`)) {
                    document.getElementById(`${lang}_price`).value = price.price;
                    document.getElementById(`${lang}_sale_price`).value = price.sale_price;
                    document.getElementById(`${lang}_tax_price`).value = price.tax_price;
                    document.getElementById(`${lang}_tax_sale_price`).value = price.tax_sale_price;
                    document.getElementById(`${lang}_discount`).value = price.discount;
                    document.getElementById(`${lang}_discount_type`).value = price.discount_type;

                }
            });
        }
    }
});
document.addEventListener('DOMContentLoaded', function () {
    const tryPriceInput = document.getElementById('try_price');
    const tryDiscountTypeInput = document.getElementById('try_discount_type');
    const tryDiscountInput = document.getElementById('try_discount');
    const trySalePriceInput = document.getElementById('try_sale_price');
    const tryVatIncludedInput = document.getElementById('try_vat_included');
    const tryTaxPriceInput = document.getElementById('try_tax_price');
    const tryTaxSalePriceInput = document.getElementById('try_tax_sale_price');

    const usdPriceInput = document.getElementById('usd_price');
    const usdDiscountTypeInput = document.getElementById('usd_discount_type');
    const usdDiscountInput = document.getElementById('usd_discount');
    const usdSalePriceInput = document.getElementById('usd_sale_price');
    const usdVatIncludedInput = document.getElementById('usd_vat_included');
    const usdTaxPriceInput = document.getElementById('usd_tax_price');
    const usdTaxSalePriceInput = document.getElementById('usd_tax_sale_price');

    const defaultVatRate = 18 / 100; // %18 KDV

    function parseNumber(value) {
        const num = parseFloat(value);
        return isNaN(num) ? 0 : num;
    }

    function calculateSalePrice(price, discount, discountType, vatIncluded) {
        let salePrice = discountType === 0 ? price - (price * (discount / 100)) : price - discount;
        return vatIncluded ? salePrice : salePrice * (1 + defaultVatRate);
    }

    function updateTryPrices() {
        const tryPrice = parseNumber(tryPriceInput.value);
        const tryDiscount = parseNumber(tryDiscountInput.value);
        const tryDiscountType = parseInt(tryDiscountTypeInput.value);
        const tryVatIncluded = tryVatIncludedInput.checked;

        const trySalePrice = calculateSalePrice(tryPrice, tryDiscount, tryDiscountType, tryVatIncluded);
        trySalePriceInput.value = trySalePrice.toFixed(2);

        // KDV dahilse, KDV'yi çıkartarak göster, dahil değilse ekleyerek hesapla
        tryTaxPriceInput.value = tryVatIncluded ? tryPrice.toFixed(2) : (tryPrice * (1 + defaultVatRate)).toFixed(2);
        tryTaxSalePriceInput.value = tryVatIncluded ? trySalePrice.toFixed(2) : (trySalePrice * (1 + defaultVatRate)).toFixed(2);
    }

    function updateUsdPrices() {
        const usdPrice = parseNumber(usdPriceInput.value);
        const usdDiscount = parseNumber(usdDiscountInput.value);
        const usdDiscountType = parseInt(usdDiscountTypeInput.value);
        const usdVatIncluded = usdVatIncludedInput.checked;

        const usdSalePrice = calculateSalePrice(usdPrice, usdDiscount, usdDiscountType, usdVatIncluded);
        usdSalePriceInput.value = usdSalePrice.toFixed(2);

        usdTaxPriceInput.value = usdVatIncluded ? usdPrice.toFixed(2) : (usdPrice * (1 + defaultVatRate)).toFixed(2);
        usdTaxSalePriceInput.value = usdVatIncluded ? usdSalePrice.toFixed(2) : (usdSalePrice * (1 + defaultVatRate)).toFixed(2);
    }

    // TRY Güncellemeleri
    tryPriceInput.addEventListener('input', updateTryPrices);
    tryDiscountTypeInput.addEventListener('change', updateTryPrices);
    tryDiscountInput.addEventListener('input', updateTryPrices);
    tryVatIncludedInput.addEventListener('change', updateTryPrices);

    // USD Güncellemeleri
    usdPriceInput.addEventListener('input', updateUsdPrices);
    usdDiscountTypeInput.addEventListener('change', updateUsdPrices);
    usdDiscountInput.addEventListener('input', updateUsdPrices);
    usdVatIncludedInput.addEventListener('change', updateUsdPrices);

    // Sayfa yüklendiğinde mevcut değerleri hesapla
    updateTryPrices();
    updateUsdPrices();
});

$(document).ready(function () {
    $(document).on('change', '.attribute-select', function () {
        var attributeId = $(this).val();
        var index = $(this).closest('.variant-item').data('index');

        if (attributeId && attributeId > 0) {
            $.ajax({
                url: baseUrl + '/backoffice/get-attribute-values/' + attributeId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#' + index + '_attribute_value_id').empty();
                    $.each(data, function (key, value) {
                        $('#' + index + '_attribute_value_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('#' + index + '_attribute_value_id').empty();
        }
    });
});
