@extends('backoffice.include.master')
@section('title','Kategori Ekle')
@section('navbar_title','Kategori Ekle')
@section('content')
    <div class="content-wrapper">
        <form id="categoryForm" name="categoryForm" enctype="multipart/form-data">
            @csrf
        <div class="container-xxl flex-grow-1 container-p-y">
            <div
                class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">

                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1">Kategori Ekleme</h4>
                    <p class="mb-0">Lütfen gerekli alanları doldurunuz.</p>
                </div>
                <div class="d-flex align-content-center flex-wrap gap-4">
                    <button type="button" onclick="createForm()"  id="categoryFormButton" class="btn btn-primary">Kaydet</button>
                </div>
            </div>
            @include('backoffice.category.partial.category_info')
            @include('backoffice.partial.web_translation')
            </form>
        </div>
    </div>

@endsection
