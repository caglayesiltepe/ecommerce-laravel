<div class="offcanvas offcanvas-end" id="update-brand-modal">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="exampleModalLabel">Marka Güncelle</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-2" id="brandFormUpdate" name="brandFormUpdate"
                  enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id">
                <div class="row">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" value="1" type="checkbox" id="up-status" name="status">
                        <label class="form-check-label" for="status">Aktif/Pasif</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col"><label class="form-label">Sıra</label>
                        <input type="number" class="form-control"
                               placeholder="Sıra" name="display_order" id="up-display_order"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Logo</label>
                        <input class="form-control" type="file" id="logo" name="logo">
                        <img class="img-thumbnail mt-2" style="max-width: 50px;" id="brand-logo-preview">
                    </div>
                </div>
                <div class="row">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#tr_create_tab_up" aria-controls="tr_create_tab_up"
                                    aria-selected="true"><span class="d-sm-block"><img
                                        src="{{asset('frontend/tr.webp')}}" style="width: 20px"/> Türkçe </span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#en_create_tab_up" aria-controls="en_create_tab_up"
                                    aria-selected="false"><span class="d-sm-block"><img
                                        src="{{asset('frontend/en.webp')}}"
                                        style="width: 15px"/> İngilizce</span></button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tr_create_tab_up" role="tabpanel">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">İçerik Adı</label>
                                    <input type="text" class="form-control" placeholder="İçerik Adı"
                                           name="tr_name" id="up-tr_name">
                                </div>
                                <div class="col">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control" placeholder="Slug"
                                           name="tr_slug" id="up-tr_slug">
                                </div>
                            </div>
                            <div class="row pt-5">
                                <div class="col">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" placeholder="Meta Title"
                                           name="tr_meta_title" id="up-tr_meta_title">
                                </div>
                                <div class="col">
                                    <label class="form-label">Meta Keywords</label>
                                    <input type="text" class="form-control" placeholder="Meta Keywords"
                                           name="tr_meta_keywords" id="up-tr_meta_keywords">
                                </div>
                            </div>
                            <div class="row pt-5">
                                <div class="col">
                                    <label class="form-label">Meta Description</label>
                                    <input type="text" class="form-control" placeholder="Meta Description"
                                           name="tr_meta_description" id="up-tr_meta_description">
                                </div>
                                <div class="col">
                                    <label class="form-label">Kısa Açıklama</label>
                                    <input type="text" class="form-control" placeholder="Kısa Açıklama"
                                           name="tr_short_description" id="up-tr_short_description">
                                </div>
                            </div>
                            <div class="row pt-5">
                                <div class="col">
                                    <label class="form-label">Açıklama</label>
                                    <textarea class="form-control" name="tr_description"
                                              id="up-tr_description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="en_create_tab_up" role="tabpanel">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">İçerik Adı</label>
                                    <input type="text" class="form-control" placeholder="İçerik Adı"
                                           name="en_name" id="up-en_name">
                                </div>
                                <div class="col">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control" placeholder="Slug"
                                           name="en_slug" id="up-en_slug">
                                </div>
                            </div>
                            <div class="row pt-5">
                                <div class="col">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" placeholder="Meta Title"
                                           name="en_meta_title" id="up-en_meta_title">
                                </div>
                                <div class="col">
                                    <label class="form-label">Meta Keywords</label>
                                    <input type="text" class="form-control" placeholder="Meta Keywords"
                                           name="en_meta_keywords" id="up-en_meta_keywords">
                                </div>
                            </div>
                            <div class="row pt-5">
                                <div class="col">
                                    <label class="form-label">Meta Description</label>
                                    <input type="text" class="form-control" placeholder="Meta Description"
                                           name="en_meta_description" id="up-en_meta_description">
                                </div>
                                <div class="col">
                                    <label class="form-label">Kısa Açıklama</label>
                                    <input type="text" class="form-control" placeholder="Kısa Açıklama"
                                           name="en_short_description" id="up-en_short_description">
                                </div>
                            </div>
                            <div class="row pt-5">
                                <div class="col">
                                    <label class="form-label">Açıklama</label>
                                    <textarea class="form-control" name="en_description"
                                              id="up-en_description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="button" onclick="updateForm()" id="brandFormButton"
                            class="btn btn-primary data-submit me-sm-4 me-1">Güncelle
                    </button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">İptal</button>
                </div>
            </form>
        </div>
    </div>
