@extends('backoffice.include.master')
@section('title','Markalar')
@section('navbar_title','Marka Listesi')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="card">
                <div class="row">
                    <div class="col-md-3">
                        <h5 class="card-header">Markalar</h5>
                    </div>
                    <div class="card-header col-md-9 d-flex justify-content-end"><div class="d-flex">
                            <div class="input-group input-group-merge me-3">
                                <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
                                <input id="globalSearch" type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31" />
                            </div>
                        </div>
                            <div class="d-flex">
                                <button class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-4 waves-effect waves-light border-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-file-export ti-xs me-sm-1"></i>
                                    <span class="d-none d-sm-inline-block">Export</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dt-button dropdown-item buttons-excel buttons-html5" href="javascript:void(0);"><span><i class="ti ti-printer me-1"></i>Print</span></a></li>
                                    <li><a class="dt-button dropdown-item buttons-excel buttons-html5" href="javascript:void(0);"><span><i class="ti ti-file-text me-1"></i>Csv</span></a></li>
                                    <li><a class="dt-button dropdown-item buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span><i class="ti ti-file-spreadsheet me-1"></i>Excel</span></a></li>
                                    <li><a class="dt-button dropdown-item buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span><i class="ti ti-file-description me-1"></i>Pdf</span></a></li>
                                </ul>
                            </div>

                        <div class="mb-0">
                            <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#add-new-brand">
                                <i class="ti ti-plus ti-xs me-2"></i>
                                <span class="align-middle">Marka Ekle</span>
                            </button>
                        </div>

                    </div>

                </div>
                <div class="card-datatable text-nowrap">
                    <table id="table" class="datatables-ajax table">
                        <thead>
                        <tr>
                            <th class="width80">#</th>
                            <th>Marka Adı</th>
                            <th>Seo Link</th>
                            <th>Logo</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@include('backoffice.brand.partial.create')
@include('backoffice.brand.partial.update')
@endsection
