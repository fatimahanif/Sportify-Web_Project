@extends('layout.template')

@section('nav-background')
    <div class="about-bg">
        <img src="img/sectionBg/banner-top.jpg" alt="about bg" class="about-bg-img" width="100%">
    </div>
@endsection

@section('page-layout')
    <!--displaying products and categories-->
    <div class="container products-div">

        <div class="row">
            <div class="col-12 text-center">

                <h1></h1>
            </div>
        </div>

        <div class="row product-row">

            <div class="col-12">
                <h3>
                    Latest products
                </h3>
            </div>

            @foreach ($products as $product)
                <div class="col-md-3 col-6 product-col">
                    <div class="card product-card">
                        <a href="/products/{{ $product->id }}">
                            <img class="card-img-top" src="{{ asset('storage/images/') }}/{{ $product->Image }}"
                                alt="Product Image">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->ProductName }}</h5>
                            <div class="rating-div">
                                @php
                                    $loop = $product->rating;
                                    $loop2 = 5 - $loop;
                                @endphp
                                @for ($i = 0; $i < $loop; $i++)
                                    <i class="fa fa-star rating-star"></i>
                                    {{-- <i class="fa fa-star  rating-star"></i>
                                <i class="fa fa-star  rating-star"></i>
                                <i class="fa fa-star  rating-star"></i> --}}
                                @endfor
                                @for ($i = 0; $i < $loop2; $i++)
                                    <i class="fa fa-star-o  rating-star"></i>
                                @endfor
                            </div>
                            <p>{{ $product->Price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="col-md-3 col-6 product-col">
                <div class="card  product-card">
                    <a href="productDetail">
                        <img class="card-img-top" src="img/products/productSix.jpg" alt="Product Image">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <div class="rating-div">
                            <i class="fa fa-star rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star-o  rating-star"></i>
                        </div>
                        <p>$70.00</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6 product-col">
                <div class="card  product-card">
                    <a href="productDetail">
                        <img class="card-img-top" src="img/productDetails/shoe.jpg" alt="Product Image">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <div class="rating-div">
                            <i class="fa fa-star rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star-o  rating-star"></i>
                        </div>
                        <p>$70.00</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6 product-col">
                <div class="card  product-card">
                    <a href="productDetail">
                        <img class="card-img-top" src="img/products/productSix.jpg" alt="Product Image">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <div class="rating-div">
                            <i class="fa fa-star rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star-o  rating-star"></i>
                        </div>
                        <p>$70.00</p>
                    </div>
                </div>
            </div> --}}

        </div>

        <div class="row product-row">

            <div class="col-12">
                <h3>
                    Top Rated Products
                </h3>
            </div>

            @foreach ($productsTop as $product)
                <div class="col-md-3 col-6 product-col">
                    <div class="card product-card">
                        <a href="/products/{{ $product->id }}">
                            <img class="card-img-top" src="{{ asset('storage/images/') }}/{{ $product->Image }}"
                                alt="Product Image">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->ProductName }}</h5>
                            <div class="rating-div">
                                @php
                                    $loop = $product->rating;
                                    $loop2 = 5 - $loop;
                                @endphp
                                @for ($i = 0; $i < $loop; $i++)
                                    <i class="fa fa-star rating-star"></i>
                                    {{-- <i class="fa fa-star  rating-star"></i>
                                <i class="fa fa-star  rating-star"></i>
                                <i class="fa fa-star  rating-star"></i> --}}
                                @endfor
                                @for ($i = 0; $i < $loop2; $i++)
                                    <i class="fa fa-star-o  rating-star"></i>
                                @endfor
                            </div>
                            <p>{{ $product->Price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- <div class="col-md-3 col-6 product-col">
                <div class="card product-card">
                    <a href="productDetail">
                        <img class="card-img-top" src="img/productDetails/shoe.jpg" alt="Product Image">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <div class="rating-div">
                            <i class="fa fa-star rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star-o  rating-star"></i>
                        </div>
                        <p>$70.00</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6 product-col">
                <div class="card  product-card">
                    <a href="productDetail">
                        <img class="card-img-top" src="img/products/productSix.jpg" alt="Product Image">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <div class="rating-div">
                            <i class="fa fa-star rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star-o  rating-star"></i>
                        </div>
                        <p>$70.00</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6 product-col">
                <div class="card  product-card">
                    <a href="productDetail">
                        <img class="card-img-top" src="img/productDetails/shoe.jpg" alt="Product Image">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <div class="rating-div">
                            <i class="fa fa-star rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star-o  rating-star"></i>
                        </div>
                        <p>$70.00</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6 product-col">
                <div class="card  product-card">
                    <a href="productDetail">
                        <img class="card-img-top" src="img/products/productSix.jpg" alt="Product Image">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <div class="rating-div">
                            <i class="fa fa-star rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star  rating-star"></i>
                            <i class="fa fa-star-o  rating-star"></i>
                        </div>
                        <p>$70.00</p>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
@endsection
