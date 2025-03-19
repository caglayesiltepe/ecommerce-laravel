<div class="card mb-6">
    <div class="card-header">
        <h5 class="card-title mb-0">Fiyatlar</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#try_create_price_tab" aria-controls="try_create_price_tab"
                            aria-selected="true">TRY
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#usd_create_price_tab" aria-controls="usd_create_price_tab"
                            aria-selected="false">USD</button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="try_create_price_tab" role="tabpanel">
                    <div class="mb-6">
                        <label class="form-label" for="price">Fiyatı</label>
                        <input type="number" class="form-control" name="try_price" id="try_price"/>
                    </div>

                    <div class="mb-6">
                        <label class="form-label" for="tax_price">Vergi Dahil Fiyat</label>
                        <input type="text" class="form-control" id="try_tax_price" name="try_tax_price" readonly/>
                    </div>

                    <div class="mb-6">
                        <label class="form-label" for="discount_type">İndirim Tipi</label>
                        <select class="form-control" name="try_discount_type" id="try_discount_type">
                            <option value="0">Yüzde</option>
                            <option value="1">TL</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label class="form-label" for="discount">İndirim Oranı</label>
                        <input type="text" class="form-control" id="try_discount" name="try_discount"/>
                    </div>
                    <!-- Discounted Price -->
                    <div class="mb-6">
                        <label class="form-label" for="sale_price">Satış Fiyat</label>
                        <input type="text" class="form-control" id="try_sale_price" name="try_sale_price" readonly/>
                    </div>
                    <div class="mb-6">
                        <label class="form-label" for="tax_sale_price">Vergi Dahil Satış Fiyatı</label>
                        <input type="text" class="form-control" id="try_tax_sale_price" name="try_tax_sale_price" readonly/>
                    </div>
                    <!-- Charge tax check box -->
                    <div class="form-check ms-2 mt-2 mb-4">
                        <input class="form-check-input" type="checkbox" value="1" name="try_vat_included" id="try_vat_included"
                               checked/>
                        <label class="switch-label" for="try_vat_included"> Kdv Dahil </label>
                    </div>
                </div>
                <div class="tab-pane fade" id="usd_create_price_tab" role="tabpanel">
                    <div class="mb-6">
                        <label class="form-label" for="price">Fiyatı</label>
                        <input type="number" class="form-control" name="usd_price" id="usd_price"/>
                    </div>
                    <div class="mb-6">
                        <label class="form-label" for="tax_price">Vergi Dahil Fiyat</label>
                        <input type="text" class="form-control" id="usd_tax_price" name="usd_tax_price" readonly/>
                    </div>
                    <div class="mb-6">
                        <label class="form-label" for="discount_type">İndirim Tipi</label>
                        <select class="form-control" name="usd_discount_type" id="usd_discount_type">
                            <option value="0">Yüzde</option>
                            <option value="1">USD</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label class="form-label" for="discount">İndirim Oranı</label>
                        <input type="text" class="form-control" id="usd_discount" name="usd_discount"/>
                    </div>
                    <!-- Discounted Price -->
                    <div class="mb-6">
                        <label class="form-label" for="sale_price">Satış Fiyat</label>
                        <input type="text" class="form-control" id="usd_sale_price" name="usd_sale_price" readonly/>
                    </div>
                    <div class="mb-6">
                        <label class="form-label" for="tax_sale_price">Vergi Dahil Satış Fiyatı</label>
                        <input type="text" class="form-control" id="usd_tax_sale_price" name="usd_tax_sale_price" readonly/>
                    </div>
                    <!-- Charge tax check box -->
                    <div class="form-check ms-2 mt-2 mb-4">
                        <input class="form-check-input" type="checkbox" value="1" name="usd_vat_included" id="usd_vat_included"
                               checked/>
                        <label class="switch-label" for="usd_vat_included"> Kdv Dahil </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
