<script src="{{asset('backoffice/')}}/assets/vendor/libs/jquery/jquery.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/popper/popper.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/js/bootstrap.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/hammer/hammer.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/js/menu.js"></script>

<script src="{{asset('backoffice/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('backoffice/assets/js/toastr.min.js')}}"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/%40form-validation/popular.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/%40form-validation/bootstrap5.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/%40form-validation/auto-focus.js"></script>

<script src="{{asset('backoffice/')}}/assets/js/main.js"></script>


<script src="{{asset('backoffice/')}}/assets/js/pages-auth.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/select2/select2.js"></script>
<script src="{{asset('backoffice/')}}/assets/js/forms-selects.js"></script>

<script>
    const baseUrl = "{{ url('/') }}";
</script>
@if(isset($process_name))
    <script src="{{ asset('backoffice/js/process/' . $process_name . '.js') }}"></script>
@endif
@if(isset($attributeValues))
    <script>
        let variantIndex = 0;

        // İlk başlatma
        $('.select2').select2();

        // Varyant ekleme fonksiyonu
        function variantAdd() {
            variantIndex++; // ID'yi artır

            let newVariant = `
        <div class="row variant-item" data-index="${variantIndex}">
            <div class="col-sm-4">
                <label class="form-label">Varyant</label>
                <select id="${variantIndex}_attribute_id" name="${variantIndex}_attribute_id" class="form-select form-control attribute-select">
                    <option value="0">Varyant Seçiniz</option>
                    @foreach($attributeValues as $attributeValue)
            <option value="{{ $attributeValue['id'] }}">{{ $attributeValue['name'] }}</option>
                    @endforeach
            </select>
             </div>

            <div class="col-sm-8">
            <label class="form-label invisible">İçerik</label>
            <select id="${variantIndex}_attribute_value_id" name="${variantIndex}_attribute_value_id[]" class="form-select form-control select2" multiple></select>
            </div>

            <div class="row mt-5">
                <div class="col-sm-3">
                    <input id="${variantIndex}_attribute_value_sku" name="${variantIndex}_attribute_value_sku" class="form-control" type="text" placeholder="SKU">
                </div>
                <div class="col-sm-3">
                    <input id="${variantIndex}_attribute_value_ean" name="${variantIndex}_attribute_value_ean" class="form-control" type="text" placeholder="EAN">
                </div>
                <div class="col-sm-3">
                    <input id="${variantIndex}_attribute_value_stock" name="${variantIndex}_attribute_value_stock" class="form-control" type="text" placeholder="STOK">
                </div>
                <div class="col-sm-3">
                <button type="button" class="btn btn-danger" onclick="removeVariant(this)">Sil</button>
                </div>
             </div>
        </div>
        `;

            // Yeni varyantı ekle
            $("#variantContainer").append(newVariant);

            // Yeni eklenen select2 öğesini başlat
            $('#' + variantIndex + '_attribute_value_id').select2();
        }

        // Yeni varyant ekleme butonuna tıklama olayını bağla
        $('#variantAdd').on('click', function () {
            variantAdd();
        });

        function removeVariant(button) {
            $(button).closest('.variant-item').remove();
        }

        $('#openai_button_web_translations').on('click', function () {
            var trName = $('#tr_name').val();
            var model = $('#model').val();

            if (!trName) {
                toastr.warning('Lütfen TR adı giriniz.');
                return;
            }

            var formData = {
                'tr_name': trName,
                'model':model
            };

            var token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: baseUrl + '/backoffice/openai/web-translation-send',
                type: 'POST',
                data: formData,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': token,
                },
                success: function (response) {
                    if (response) {
                        fillFormFields(response);
                    }
                },
                error: function (error) {
                    console.error('Hata:', error);
                }
            });
        });


        function fillFormFields(data) {
            if (data) {
                const fields = [
                    'tr_slug', 'tr_meta_title', 'tr_meta_keywords', 'tr_meta_description',
                    'tr_short_description', 'tr_description', 'en_name', 'en_slug',
                    'en_meta_title', 'en_meta_keywords', 'en_meta_description',
                    'en_short_description', 'en_description'
                ];

                fields.forEach(field => {
                    if (data[field]) {
                        if (field === 'tr_description' || field === 'en_description') {
                            CKEDITOR.instances[field].setData(data[field]);
                        } else {
                            document.getElementById(field).value = data[field];
                        }
                    }
                });
            }
        }


    </script>
    @endif
    </body>

    </html>
