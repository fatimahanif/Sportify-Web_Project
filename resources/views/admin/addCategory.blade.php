@extends('layout.adminTemplate')
@include('layout.partial.adminCheck')
{{-- vertical bar --}}
@section('linkOne', '/admin')
@section('linkOneIcon', 'fa-house')
@section('linkTitleOne', 'Dashboard')

@section('linkTwo', '/admin/products')
@section('linkTwoIcon', 'fa-square-rss')
@section('linkTitleTwo', 'Products')

@section('linkThree', '/admin/categories')
@section('linkThreeIcon', 'fa-square-rss')
@section('linkTitleThree', 'Categories')


@section('page-content')
    <div class="col-10 mt-3" id="mainContentAdminPanel">
        <div class="row">
            <div class="col-12">
                <p class="font-one">Add New Category</p>
            </div>

            <div class="col-12">
                {{-- /addCategory/{$categoryName}/{$description} --}}
                <form action="/admin/addCategory/{$categoryName}/{$description}" method="POST"
                    onsubmit="return validateForm()">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <input type="text" placeholder="Category Name" class="form-control my-3" name="categoryName"
                                id="postTitle" onkeypress="validateForm()" autocomplete="off" />
                            <p id="titleText"></p>


                            <textarea class="col-12 form-control" name="description" id="" rows="5"
                                placeholder="Category Description..." onkeypress="validateForm()"></textarea>
                            <p id="editorText"></p>

                            <input type="submit" value="Add Category" class="btn btn-primary my-3" />
                        </div>



                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
