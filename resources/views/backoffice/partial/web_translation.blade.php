<div class="row">
    <div class="card mb-6">
        <div class="card-header">
            <div
                class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">

            <div class="d-flex flex-column justify-content-center">
            <h5 class="card-title mb-0">İçerik</h5>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-4">
            <button id="openai_button_web_translations" name="openai_button_web_translations" type="button" class="btn rounded-pill btn-outline-primary waves-effect"><span class="icon-xs icon-base ti tabler-star me-2"></span> OpenAI ile İçerikleri Doldur</button>
            </div>
            </div>
            </div>
        <div class="card-body">
            <div class="row">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#tr_create_tab" aria-controls="tr_create_tab"
                                aria-selected="true"><span class="d-sm-block"><img
                                    src="{{asset('frontend/tr.webp')}}" style="width: 20px"/> Türkçe </span>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#en_create_tab" aria-controls="en_create_tab"
                                aria-selected="false"><span class="d-sm-block"><img
                                    src="{{asset('frontend/en.webp')}}"
                                    style="width: 15px"/> İngilizce</span></button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tr_create_tab" role="tabpanel">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">İçerik Adı</label>
                                <input type="text" class="form-control" placeholder="İçerik Adı"
                                       name="tr_name" id="tr_name">
                            </div>
                            <div class="col">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control" placeholder="Slug"
                                       name="tr_slug" id="tr_slug">
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col">
                                <label class="form-label">Meta Title</label>
                                <input type="text" class="form-control" placeholder="Meta Title"
                                       name="tr_meta_title" id="tr_meta_title">
                            </div>
                            <div class="col">
                                <label class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" placeholder="Meta Keywords"
                                       name="tr_meta_keywords" id="tr_meta_keywords">
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col">
                                <label class="form-label">Meta Description</label>
                                <input type="text" class="form-control" placeholder="Meta Description"
                                       name="tr_meta_description" id="tr_meta_description">
                            </div>
                            <div class="col">
                                <label class="form-label">Kısa Açıklama</label>
                                <input type="text" class="form-control" placeholder="Kısa Açıklama"
                                       name="tr_short_description" id="tr_short_description">
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col">
                                <label class="form-label">Açıklama</label>
                                <textarea class="ckeditor" name="tr_description"
                                          id="tr_description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="en_create_tab" role="tabpanel">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">İçerik Adı</label>
                                <input type="text" class="form-control" placeholder="İçerik Adı"
                                       name="en_name" id="en_name">
                            </div>
                            <div class="col">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control" placeholder="Slug"
                                       name="en_slug" id="en_slug">
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col">
                                <label class="form-label">Meta Title</label>
                                <input type="text" class="form-control" placeholder="Meta Title"
                                       name="en_meta_title" id="en_meta_title">
                            </div>
                            <div class="col">
                                <label class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" placeholder="Meta Keywords"
                                       name="en_meta_keywords" id="en_meta_keywords">
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col">
                                <label class="form-label">Meta Description</label>
                                <input type="text" class="form-control" placeholder="Meta Description"
                                       name="en_meta_description" id="en_meta_description">
                            </div>
                            <div class="col">
                                <label class="form-label">Kısa Açıklama</label>
                                <input type="text" class="form-control" placeholder="Kısa Açıklama"
                                       name="en_short_description" id="en_short_description">
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col">
                                <label class="form-label">Açıklama</label>
                                <textarea class="ckeditor" name="en_description"
                                          id="en_description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
