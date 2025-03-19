<div class="card mb-6">
    <div class="card-header">
        <h5 class="card-title mb-0">Bilgiler</h5>
    </div>
    <div class="card-body">
        <div class="row mb-6">
            <div class="form-check form-switch mb-2">
                <input class="form-check-input" value="1" type="checkbox" id="status" name="status" checked>
                <label class="form-check-label" for="status">Aktif/Pasif</label>
            </div>
        </div>
        <div class="row mb-6">
            <div class="col"><label class="form-label">Sıra</label>
                <input type="number" class="form-control"
                       placeholder="Sıra" name="display_order" id="display_order"></div>
            <div class="col"><label class="form-label">Stok</label>
                <input type="number" class="form-control"
                       placeholder="Stok" name="stock" id="stock"></div>
            <div class="col">
                <label class="form-label">Resimler</label>
                <input class="form-control" type="file" id="image" name="image" multiple>
            </div>
        </div>
        <div class="row mb-6">
            <div class="col">
                <label for="select2Primary" class="form-label">Kategori</label>
                <div class="select2-primary">
                    <select id="category_id" name="category_id" class="form-select form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">
                                {{ $category['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="select2Primary" class="form-label">Marka</label>
                <div class="select2-primary">
                    <select id="brand_id" name="brand_id" class="form-select form-control">
                        @foreach($brands as $brand)
                            <option value="{{ $brand['id'] }}">
                                {{ $brand['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
