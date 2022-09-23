@extends('layout.adminTemplate')
@include('layout.partial.adminCheck')
{{-- vertical bar --}}
@section('linkOne', '/admin/')
@section('linkOneIcon', 'fa-house')
@section('linkTitleOne', 'Dashboard')

@section('linkTwo', '/admin/products')
@section('linkTwoIcon', 'fa-square-rss')
@section('linkTitleTwo', 'Products')

@section('linkThree', '/admin/categories')
@section('linkThreeIcon', 'fa-square-rss')
@section('linkTitleThree', 'Categories')

@section('page-content')

    <div class="col-10 mt-5 mb-5" id="mainContentAdminPannel">
        <div class="row">
            <div class="col-12">
                <div class="row mb-5">
                    <div class="col-md-10 col-6">
                        <h4>
                            ALL PRODUCTS
                        </h4>
                    </div>
                    <div class="col-md-2 col-6">
                        <button class="btn btn-primary-update"><a href="/admin/addProduct/">Add Product</a></button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped registeredUserTable">
            <tbody id="tableProducts">

                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </tr>


            </tbody>
        </table>
        <button class="btn btn-primary-update" id="loadMoreProducts">Load More</button>
    </div>







@endsection

@section('scriptOne')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endsection

@section('scriptTwo')
    <script src="{{ asset('scripts/fetchProducts.js') }}"></script>
@endsection
