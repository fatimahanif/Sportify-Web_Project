<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sportify</title>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- Bootstrap + Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/product_styles.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/product_detail_styles.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    @yield('script')
    <script src="{{ URL::asset('scripts/cart.js') }}" defer></script>
    <script src="{{ URL::asset('scripts/cartEvents.js') }}" defer></script>
    <script src="{{ URL::asset('scripts/validation.js') }}" defer></script>
    <script src="{{ URL::asset('scripts/product_detail.js') }}" defer></script>
</head>

<body>
    <div class="header d-flex flex-column flex-sm-row justify-content-around align-items-center d-lg-none">
        <div class="img-container">
            <img src="{{ URL::asset('img/logo.png') }}" alt="Logo of site" />
        </div>

        <div class="header-icons">
            <span>
                <i class="fas fa-search"></i>
            </span>
            <span>
                <i class="fas fa-shopping-cart"></i>
            </span>
        </div>
    </div>

    <div class="nav-mobo w-75 mx-auto my-3 d-block d-lg-none">
        <div class="d-flex justify-content-between align-items-center pr-3">
            <div class="logo-mobile">
                <img src="{{ URL::asset('img/moboLogo.PNG') }}" alt="" />
            </div>

            <div class="menu">
                <i class="fas fa-bars text-white"></i>
            </div>
        </div>

        <div class="d-flex-column justify-content-between align-items-center nav-mobo-dropdown">
            <div>
                <p class="my-0 py-2"><a href="{{ route('index') }}">HOME</a></p>
            </div>
            <div>
                <p class="my-0 py-2"><a href="{{ route('home.about') }}">ABOUT US</a></p>
            </div>
            <div>
                <p class="my-0 py-2"><a href="{{ route('home.contact') }}">CONTACT US</a></p>
            </div>
            <div>
                <p class="my-0 py-2"><a href="{{ route('products.index') }}">ALL PRODUCTS</a></p>
            </div>
        </div>


    </div>

    <nav id="nav" class="d-none d-lg-flex">
        <div class="nav-left"></div>

        <div class="nav_imgContainer">
            <img src="{{ URL::asset('img/logo.png') }}" alt="Logo of the site" />
        </div>

        <ul class="nav-right d-flex">
            <li>
                <a class="" href="{{ route('index') }}">Home</a>
            </li>

            <li>
                <a href="{{ url('/categories') }}">Categories</a>
                <!-- <div class="container"> -->
                    <div class="row dropdown-mega">
                        @php
                            $categories_to_display = DB::table('productcategories')->select('id','CategoryName')->take(4)->get();
                            $i = 0;
                        @endphp
                        <div class="col-3 px-3 mt-3">

                            @foreach($categories_to_display as $category)
                                
                                <a style="color: black; font-weight: 600;" href='/products/category/{{$category->id}}'>{{$category->CategoryName}}</a>
                                @php
                                    $i++;
                                    $products_to_display = DB::table('productcategories')->select('Products.id', 'ProductName', 'ProductCategory')->join('Products', 'productcategories.id', '=', 'Products.ProductCategory')->where('ProductCategory', $category->id)->take(4)->get();
                                @endphp
                                <ul class="" style="padding-bottom: 15px;">
                                    @foreach($products_to_display as $product)
                                        <li><a href="/products/{{$product->id}}">{{$product->ProductName}}</a></li>
                                    @endforeach
                                    <!-- <li><a href="{{ url('productPage') }}">Men</a></li>
                                    <li><a href="{{ url('productPage') }}">Women</a></li>
                                    <li><a href="{{ url('productPage') }}">Children</a></li>
                                    <li><a href="{{ url('productPage') }}">Toddlers</a></li> -->
                                </ul>
                                <!-- new column if divisible by 2 -->
                                @if ($i%2 == 0)
                                    </div>
                                    @if($i==2)
                                        <div class="col-3 px-3 mt-3">
                                    @endif
                                @endif
                            @endforeach
                        
                        <div class="col-6 mt-3">
                            <div class="row">
                                @php
                                $cards_data = DB::table('Products')->select('id','ProductName', 'ProductDescription', 'Image')->take(2)->get();
                                @endphp
                                @foreach($cards_data as $product)
                                    <div class="col-12">
                                            <div class="card mb-3">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4 img-card-container">
                                                        <img src="{{ asset('storage/images/') }}/{{ $product->Image }}" alt="product image" />
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{$product->ProductName}}</h5>
                                                            <p class="card-text">{{$product->ProductDescription}}</p>

                                                            <a href="/products/{{$product->id}}" class="btn btn-primary">Shop Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- <div class="col-12">
                                            <div class="card mb-3">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4 img-card-container">
                                                        <img src="{{ URL::asset('img/items/item1.jpg') }}" alt="..." />
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Sports Shirt</h5>
                                                            <p class="card-text">
                                                                Get the latest sports shirt for your favorite sports at a
                                                                discounted price today. Shop &nbsp;
                                                            </p>

                                                            <a href="{{ url('productDetail') }}" class="btn">Shop Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="card mb-3">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4 img-card-container">
                                                        <img src="{{ URL::asset('img/items/item2.jpg') }}" alt="..." />
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Sports Shirt</h5>
                                                            <p class="card-text">
                                                                Get the latest sports shirt for your favorite sports at a
                                                                discounted price today. Shop &nbsp;
                                                            </p>
                                                            <a href="{{ url('productDetail') }}" class="btn">Shop
                                                                Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                @endforeach
                        </div>
                    </div>
                <!-- </div> -->
            </li>

            {{-- Products --}}
            <li>
                <a href="{{ route('products.index') }}">Products</a>

            </li>

            {{-- Contact Us --}}
            <li>
                <a href="{{ route('home.contact') }}">Contact</a>

            </li>

            {{-- About uS --}}
            <li>
                <a href="{{ route('home.about') }}">About</a>
            </li>


            {{-- Cart --}}
            <li>
                <a id="cart-nav-btn">
                    <div class="cart-btn">
                        <span class="nav-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </span>
                        <div class="cart-items">1</div>
                    </div>
                </a>
            </li>

            {{-- Search --}}
            <li class="searchNavItem">
                <form action="{{ route('product.search') }}" method="get">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="Search"
                            style="border: none; width: 100px;" name="product" autocomplete="off" >
                        <button class="btn bg-white"
                            style="border-top-left-radius: 0; border-bottom-left-radius: 0; border: none;">
                            <i class="fa fa-search" style="color: #495057"></i>
                        </button>
                    </div>
                </form>

            </li>

            {{-- User profile --}}
            <li class="dropdown dropdownNavItem">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="nav-icon profile-btn">
                        <i class="fas fa-user" style="color: white;"></i>
                        {{-- {{ url('storage/images') }}/{{ $customer->image }} --}}
                        {{-- <img src="{{ asset('storage/images') }}/{{ $customer->image }}" alt=""
                            class="img-small"> --}}
                    </span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item"
                        href="{{ url('customer/') }}/{{ Session('userId') }}/edit">Profile</a>

                    @php
                        $userId = Session('userId');
                    @endphp
                    @if (Session('userId'))
                        <a class="dropdown-item"
                            href="{{ route('customer.destroy', ['customer' => $userId]) }}">Logout</a>
                    @endif

                </div>
            </li>

        </ul>
    </nav>

    @yield('nav-background')
    @if (Session('userId'))
    @else
        <script>
            window.location = "/";
        </script>
    @endif
    {{-- <div class="bg-info p-4 text-center">
        @if (Session('userId'))
            {{ Session('userId') }} has logged in
        @endif
    </div> --}}

    @yield('page-layout')
    <!-- FOOTER  -->
    <div class="footer bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 order-2 col-lg-3 pt-md-4 order-lg-1">
                    <a class="footer__tag btn btn-primary mb-3" href="{{ url('contact') }}">CONTACT US</a>
                    <ul class="list-group">
                        <li class="list-group-item d-flex info-group">
                            <div class="info-group__icon d-flex justify-content-center align-items-center">
                                <i class="fas fa-map-marker px-4"></i>
                            </div>
                            <div class="info-group__text pl-3">
                                <p>Address:</p>
                                <p class="text-muted">
                                    G-7 Markaz, Islamabad
                                </p>
                            </div>
                        </li>

                        <li class="list-group-item d-flex info-group">
                            <div class="info-group__icon d-flex justify-content-center align-items-center">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info-group__text pl-3">
                                <p>Phone:</p>
                                <p class="text-muted">+92 51 2288333</p>
                            </div>
                        </li>

                        <li class="list-group-item d-flex info-group">
                            <div class="info-group__icon d-flex justify-content-center align-items-center">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info-group__text pl-3">
                                <p>Email:</p>
                                <p class="text-muted">sportify@example.com</p>
                            </div>
                        </li>

                        <li class="list-group-item d-flex info-group">
                            <div class="info-group__icon d-flex justify-content-center align-items-center">
                                <i class="fas fa-clock px-4"></i>
                            </div>
                            <div class="info-group__text pl-3">
                                <p>Opening Time:</p>
                                <p class="text-muted">
                                    Mon - Sun : 0800 - 1700
                                </p>
                            </div>
                        </li>
                    </ul>

                    <!-- <p>© 2022. All Rights Reserved. Designed by Dawood & Fatima</p> -->
                </div>
                <div class="col-12 col-md-12 col-lg-6 footer-center order-1 order-lg-2">
                    <div class="newsletter d-flex flex-column text-center text-white">
                        <h5 class="footer-center__title">NEWSLETTER SIGN-UP</h5>

                        <p class="text-muted">
                            Subscribe to our newsletter using your email is to get updates regarding all products and
                            discounts.
                        </p>

                        <div class="newsletter-search d-flex align-items-center justify-content-center">
                            <input type="text" id="email" placeholder="Enter Your Email"
                                autocomplete="off" />
                            <input type="submit" id="submit-contact-form" />
                        </div>
                        <label for="email" id="emailValidator"></label>

                    </div>

                    <div class="social-links mt-5">
                        <p class="text-center h5 text-white">FOLLOW US</p>
                        <ul class="d-flex justify-content-center">
                            <li class="info-group">
                                <div class="info-group__icon d-flex justify-content-center align-items-center">
                                    <a href="https://www.facebook.com" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                            </li>

                            <li class="info-group">
                                <div class="info-group__icon d-flex justify-content-center align-items-center">
                                    <a href="https://www.twitter.com" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                            </li>

                            <li class="info-group">
                                <div class="info-group__icon d-flex justify-content-center align-items-center">
                                    <a href="https://www.discord.com" target="_blank">
                                        <i class="fab fa-discord"></i>
                                    </a>
                                </div>
                            </li>

                            <li class="info-group">
                                <div class="info-group__icon d-flex justify-content-center align-items-center">
                                    <a href="https://www.youtube.com" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 text-muted p-md-4 order-3 order-lg-3">
                    <a class="footer__tag btn btn-primary mb-3" href="{{ url('about') }}">ABOUT US</a>

                    <p>
                        Sportify is Pakistan's best sports store. We provide sports equipment for all major sports
                        played all across the country. We also provide the best quality sportswear for each sport.
                    </p>

                    <p>
                        Our mission is to provide the best quality sports eqipment at thr lowest and most affordable
                        rates. We ensure you will be amazed by our services.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!--CART-->
    <div class="cart-overlay" id="cart-overlay-div">
        @php
            $i = 0;
            $totalCost = 0;
        @endphp

        <div class="cart">
            <span class="close-cart" id="close-cart-btn">
                <i class="far fa-times-circle"></i>
            </span>
            <div class="cart-content" id="cart-content-div">
                @foreach ($productArray as $product)
                    @php
                        $totalCost += $product->Price * $quantityArray[$i];
                    @endphp
                @endforeach

            </div>
            <div class="cart-footer">
                <h3>Total Cost: $ <span class="cart-total">{{ $totalCost }}</span></h3>
                <button class="clear-cart banner-btn btn btn-primary btn-sm" id="clear-cart-btn">
                    Clear Cart
                </button>
                <button class="clear-cart banner-btn btn btn-primary btn-sm" id="checkout-btn">
                    <a href="{{ url('checkout') }}">Checkout</a>
                </button>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{ asset('scripts/cartAjax.js') }}" defer></script>

</body>

</html>
