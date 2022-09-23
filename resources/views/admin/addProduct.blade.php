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
                <p class="font-one">Add New Product</p>
            </div>

            <div class="col-12">
                <!-- {{-- /addProduct/{$productName}/{$price}/{$category}/{$imagePost}/{$description} --}} -->

                <!-- /admin/addProduct/{$productName}/{$price}/{$category}/{$imagePost}/{$description} -->
                <form action="{{route('admin.addNewProduct')}}"
                    method="POST" onsubmit="return validateForm()" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <input type="text" placeholder="Enter Product Tilte" class="form-control my-3"
                                name="productName" id="postTitle" onkeypress="validateForm()" autocomplete="off" />
                            <p id="titleText"></p>
                            <input type="number" placeholder="Enter Product Price" class="form-control my-3" name="price"
                                id="" onkeypress="validateForm()" autocomplete="off" />
                            <p id=""></p>

                            <select name="category" class="form-control my-3" id="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->CategoryName }}</option>
                                @endforeach
                            </select>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input my-5" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01" name="imagePost" accept="image/*" />
                                <label class="custom-file-label" for="inputGroupFile01">Add Media</label>
                            </div>
                            <textarea class="col-12 form-control" name="description" id="editor" rows="5"
                                placeholder="Product Description..." onkeypress="validateForm()"></textarea>
                            <p id="editorText"></p>

                            <input type="submit" value="Add Product" class="btn btn-primary my-3" />
                        </div>



                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
