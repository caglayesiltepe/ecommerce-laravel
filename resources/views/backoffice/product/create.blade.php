@extends('backoffice.include.master')
@section('title','Ürün Ekle')
@section('navbar_title','Ürün Ekle')
@section('content')
    <div class="content-wrapper">
        <form id="productForm" name="productForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="model" id="model" value="Ürün">
            <div class="container-xxl flex-grow-1 container-p-y">
                <div
                    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">

                    <div class="d-flex flex-column justify-content-center">
                        <h4 class="mb-1">Ürün Ekleme</h4>
                        <p class="mb-0">Lütfen gerekli alanları doldurunuz.</p>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-4">
                        <button type="button" onclick="createForm()" id="productFormButton" class="btn btn-primary">
                            Kaydet
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <!-- Product Info -->
                        @include('backoffice.product.partial.product_info')
                        <!-- /Product Info-->
                    </div>
                    <div class="col-12 col-lg-8">
                        <!--Web Translations -->
                        @include('backoffice.partial.web_translation')
                        <!--Web Translations -->
                    </div>
                    <div class="col-12 col-lg-4">
                        <!-- Pricing Card -->
                        @include('backoffice.product.partial.product_prices')
                        <!-- /Pricing Card -->
                    </div>

                    <div class="row">
                        <!--Product Variants-->
                        @include('backoffice.product.partial.product_variants')
                        <!--Product Variants-->
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
