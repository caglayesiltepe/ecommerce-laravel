<div class="row">
    <div class="card mb-6">
        <div class="card-header">
            <h5 class="card-title mb-0">Kategori Bilgileri</h5>
            <div class="card-body">
                <div class="row">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" value="1" type="checkbox" id="status" name="status" checked>
                        <label class="form-check-label" for="status">Aktif/Pasif</label>
                    </div>
                </div>
                <div class="row mb-6">
                    <div class="col"><label class="form-label">Sıra</label>
                        <input type="number" class="form-control"
                               placeholder="Sıra" name="display_order" id="display_order"></div>
                    <div class="col"><label class="form-label">Kategori</label>
                        <select id="parent_id" name="parent_id" class="form-control form-select">
                            <option value="0">Ana Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category['id'] }}">
                                    {{ $category['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-6">
                    <div class="col">
                        <label class="form-label">Kategori Resmi</label>
                        <input class="form-control" type="file" id="image" name="image">
                        @if(isset($info[0]['image']))
                            <img src="{{ asset('storage/'.$info[0]['image']) }}" class="img-thumbnail mt-2" style="max-width: 50px;">
                        @endif
                    </div>
                    <div class="col">
                        <label class="form-label">Küçük Resim</label>
                        <input class="form-control" type="file" id="small_image" name="small_image">
                        @if(isset($info[0]['small_image']))
                            <img src="{{ asset('storage/'.$info[0]['small_image']) }}" class="img-thumbnail mt-2" style="max-width: 50px;">
                        @endif
                    </div>
                    <div class="col">
                        <label class="form-label">İkon</label>
                        <input class="form-control" type="file" id="icon" name="icon">
                        @if(isset($info[0]['icon']))
                            <img src="{{ asset('storage/'.$info[0]['icon']) }}" class="img-thumbnail mt-2" style="max-width: 50px;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
