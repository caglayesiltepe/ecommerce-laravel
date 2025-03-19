<div class="offcanvas offcanvas-end" id="add-new-record">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="exampleModalLabel">Yeni Kategori</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
        <form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
            <div class="col-sm-12">
                <label class="form-label" for="basicFullname">Kategori</label>
               <select class="selectpicker w-100" data-style="btn-default">
                   <option value="AK">Alaska</option>
                   <option value="HI">Hawaii</option>
                   <option value="CA">California</option>
                   <option value="NV">Nevada</option>
                   <option value="OR">Oregon</option>
                   <option value="WA">Washington</option>
                   <option value="AZ">Arizona</option>
                   <option value="CO">Colorado</option>
                   <option value="ID">Idaho</option>
               </select>
            </div>
            <div class="nav-align-top nav-tabs-shadow mb-6">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#tr_create_tab" aria-controls="tr_create_tab" aria-selected="true"><span class="d-none d-sm-block"><i class="tf-icons ti ti-home ti-sm me-1_5"></i> Türkçe </span><i class="ti ti-home ti-sm d-sm-none"></i></button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#en_create_tab" aria-controls="en_create_tab" aria-selected="false"><span class="d-none d-sm-block"><i class="tf-icons ti ti-user ti-sm me-1_5"></i> İngilizce</span><i class="ti ti-user ti-sm d-sm-none"></i></button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tr_create_tab" role="tabpanel">
                        <p>
                            Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps powder. Bear
                            claw
                            candy topping.
                        </p>
                        <p class="mb-0">
                            Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon jelly-o
                            jelly-o ice
                            cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow jujubes sweet.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="en_create_tab" role="tabpanel">
                        <div class="col-sm-12">
                            <label class="form-label" for="basicFullname">Full Name</label>
                            <div class="input-group input-group-merge">
                                <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                                <input type="text" id="basicFullname" class="form-control dt-full-name" name="basicFullname"
                                       placeholder="John Doe" aria-label="John Doe" aria-describedby="basicFullname2"/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="basicPost">Post</label>
                            <div class="input-group input-group-merge">
                                <span id="basicPost2" class="input-group-text"><i class='ti ti-briefcase'></i></span>
                                <input type="text" id="basicPost" name="basicPost" class="form-control dt-post"
                                       placeholder="Web Developer" aria-label="Web Developer" aria-describedby="basicPost2"/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="basicEmail">Email</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-mail"></i></span>
                                <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email"
                                       placeholder="john.doe@example.com" aria-label="john.doe@example.com"/>
                            </div>
                            <div class="form-text">
                                You can use letters, numbers & periods
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="basicDate">Joining Date</label>
                            <div class="input-group input-group-merge">
                                <span id="basicDate2" class="input-group-text"><i class='ti ti-calendar'></i></span>
                                <input type="text" class="form-control dt-date" id="basicDate" name="basicDate"
                                       aria-describedby="basicDate2" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY"/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="basicSalary">Salary</label>
                            <div class="input-group input-group-merge">
                                <span id="basicSalary2" class="input-group-text"><i class='ti ti-currency-dollar'></i></span>
                                <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary"
                                       placeholder="12000" aria-label="12000" aria-describedby="basicSalary2"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
            </div>
        </form>
    </div>
</div>
<div class="mb-0">
    <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#add-new-record">
        <i class="ti ti-plus ti-xs me-2"></i>
        <span class="align-middle">Kategori Ekle</span>
    </button>
</div>
