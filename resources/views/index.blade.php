@extends('layout.template')
@section('script')
    <script src="{{ URL::asset('scripts/index.js') }}" defer></script>
@endsection
@section('nav-background')
    <div class="slider">
        <div class="slides text-center text-lg-left">
            <div class="slide current d-flex flex-column justify-content-center">
                <div class="content ml-0">
                    <h1 class="scaleDownAnimation">FASHION SWEATER COLOR.</h1>
                    <p class="scaleUpAnimation">
                        Discover the collection as styled by fashion icon Caroline Issa in
                        <br /> our new seasoncampaign.
                    </p>
                    <p class="scaleUpAnimation">
                        <small><b>Best Price: $370</b></small>
                    </p>

                    <button class="btn btn-primary scaleDownAnimationBtn">
                        <a href="">Shop Now</a>
                    </button>
                </div>
            </div>

            <div class="slide d-flex flex-column justify-content-center">
                <div class="content ml-0">
                    <h1>FASHION SWEATER COLOR.</h1>
                    <p>
                        Discover the collection as styled by fashion icon Caroline Issa in
                        <br /> our new seasoncampaign.
                    </p>
                    <p>
                        <small><b>Best Price: $370</b></small>
                    </p>

                    <button class="btn btn-primary">
                        <a href="">Shop Now</a>
                    </button>
                </div>
            </div>

            <div class="slide d-flex flex-column justify-content-center">
                <div class="content ml-0">
                    <h1>FASHION SWEATER COLOR.</h1>
                    <p>
                        Discover the collection as styled by fashion icon Caroline Issa in
                        <br /> our new seasoncampaign.
                    </p>
                    <p>
                        <small><b>Best Price: $370</b></small>
                    </p>

                    <button class="btn btn-primary">
                        <a href="">Shop Now</a>
                    </button>
                </div>
            </div>
            <!-- Slider Ends  -->
        </div>

        <div class="slider-btn">
            <button id="prev">
                <i class="fas fa-arrow-left"></i>
            </button>
            <button id="next">
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>
@endsection


@section('page-layout')
    <div class="productList bg-secondary mb-5">
        <div class="container-fluid">
            <div class="row">
                @foreach ($category as $cat)
                    @php
                        // $parameter = [
                        //     'id' => $cat->id,
                        // ];
                        // $parameter = Crypt::encrypt($parameter);
                    @endphp
                    <a href="/products/category/{{ $cat->id }}"
                        class="productList__productItem col-12 col-md-3 text-center">
                        <div>
                            <span class="productList__icon">
                                <img src="{{ asset('storage/images') }}/{{ $cat->Image }}" alt=""
                                    class="catImage">
                            </span>
                            <p class="productList__title">{{ $cat->CategoryName }}</p>
                        </div>
                    </a>
                @endforeach

                {{-- <div class="productList__productItem col-12 col-md-3 text-center">
                    <span class="productList__icon">
                        <i class="fab fa-dribbble"></i>
                    </span>
                    <p class="productList__title">TENNIS</p>
                </div>

                <div class="productList__productItem col-12 col-md-3 text-center">
                    <span class="productList__icon">
                        <i class="fab fa-weibo"></i>
                    </span>
                    <p class="productList__title">FOOTBALL</p>
                </div>

                <div class="productList__productItem col-12 col-md-3 text-center">
                    <span class="productList__icon">
                        <i class="fas fa-baseball-ball"></i>
                    </span>
                    <p class="productList__title">HOCKEY</p>
                </div> --}}

                <!-- ############# Row -->
            </div>
            <!-- ######## Container Ends here -->
        </div>

        <!-- Product list ends here -->
    </div>

    <!-- ##########################FEATURES Section Starts HERE ############################################# -->

    <div class="featureList container mb-5">
        <div class="row align-items-center justify-content-around">
            <div class="featureList__feature text-center col-12 col-sm-6 col-lg-3 mt-5 mt-sm-5 mt-lg-0">
                <span class="featureList__icon text-center">
                    <i class="fas fa-rocket"></i>
                </span>
                <p class="featuteList__title">RETURN & EXCHANGE</p>
                <p class="featureList__text">
                    Return the products you do not like and get free exchange
                </p>
            </div>

            <!-- feature #2 -->
            <div class="featureList__feature text-center col-12 col-sm-6 col-lg-3 mt-5 mt-sm-5 mt-lg-0">
                <span class="featureList__icon"> <i class="fas fa-truck"></i> </span>
                <p class="featuteList__title">FREE SHIPPING</p>
                <p class="featureList__text">
                    Free shipping of your orders to your doorstep
                </p>
            </div>

            <!-- feature #3 -->
            <div class="featureList__feature text-center col-12 col-sm-6 col-lg-3 mt-5 mt-sm-5 mt-lg-0">
                <span class="featureList__icon"> <i class="fas fa-gift"></i> </span>
                <p class="featuteList__title">MEMBER DISCOUNT</p>
                <p class="featureList__text">
                    Register today to get special discounts on a wide variety of products
                </p>
            </div>

            <!-- feature #4 -->
            <div class="featureList__feature text-center col-12 col-sm-6 col-lg-3 mt-5 mt-sm-5 mt-lg-0">
                <span class="featureList__icon">
                    <i class="fas fa-headphones"></i>
                </span>
                <p class="featuteList__title">FREE SHIPPING</p>
                <p class="featureList__text">
                    Lorem ipsum dolor sit amet cowead- ipiscing eli sed do
                </p>
            </div>
            <!-- Row -->
        </div>
        <!-- ########### FEATURE LIST ENDS HERE ################## -->
    </div>

    <!--############################ NEW PRODUCT SECTION ################### -->
    <div class="newProducts my-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center heading">
                        <span class="heading__main">NEW PRODUCTS</span>
                        <span class="heading__sub">Top sale for all days</span>
                    </h1>
                    <ul class="d-none newProducts__tabs nav mx-auto d-md-flex">
                        <li class="nav-item newProducts__tabs-active">BEST SELLERS</li>
                        <li class="nav-item">COLLECTIONS</li>
                        <li class="nav-item">TRENDING</li>
                    </ul>
                </div>

                <div class="row mt-5 mb-5">
                    @foreach ($products as $product)
                        <div class="col-12 col-lg-3 col-sm-6 d-flex justify-content-center d-sm-block">
                            <div class="imageInfoCon">
                                <a href="products/{{ $product->id }}">
                                    <div class="imgOverlays imgTransition">
                                        <img src="{{ URL::asset('img/products') }}/{{ $product->Image }}"
                                            alt="product  img" />
                                        <img src="{{ URL::asset('img/products/productSix.jpg') }}"
                                            alt="product One Alternative image" class="imgTransition__img" />
                                    </div>
                                </a>
                                <div class="imgInfo__item">
                                    <p>{{ $product->ProductName }}</p>

                                    <div class="imgInfo__cartInfo d-flex justify-content-between pl-3 align-items-center">
                                        <span>Rs. {{ $product->Price }}</span>
                                        <span class="imgInfo__cardInfoIcon pr-3">
                                            <i class="fas fa-shopping-cart"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- ROw -->
            </div>
            <!-- Container Ends Here  -->
        </div>
        <!-- NEw products Ends Here  -->
    </div>

    <!-- ################################ SALES SECTION ######################## -->
    <div class="container sales my-5">
        <div class="row">
            <div class="col-12 col-lg-6">
                <!-- Sales Component -->
                <div class="col-12 sales__product d-flex">
                    <div class="sales__productImage imgOpacity">
                        <img src="{{ URL::asset('img/sectionBg/sale/sportswear.webp') }}" alt="Sales Shirt" />
                    </div>
                    <div class="sales__productDescription text-center pl-lg-5 mt-5">
                        <p class="sales__productCompany">Football Product</p>
                        <p class="sales__productTitle">SPORTSWEAR</p>
                        <p class="sales__productText">
                            Introducing the best sportswear at cheapest prices. Get this amazing football shirt for just $50
                        </p>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <!-- Sales Component -->
                    <div class="col-12 sales__product d-flex flex-row-reverse justify-content-between">
                        <div class="sales__productImage-two imgOpacity">
                            <img src="{{ URL::asset('img/sectionBg/sale/nikeShoes.png') }}" alt="Sales Shirt" />
                        </div>
                        <div class="sales__productDescription text-center pr-lg-5">
                            <p class="sales__productCompany">Football product</p>
                            <p class="sales__productTitle">SPORTSWEAR</p>
                            <p class="sales__productText">
                                Introducing the best sportswear at cheapest prices. Get this amazing football shoes for just
                                $50
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Discound or Sale Image Here -->
            <div class="col-12 col-lg-6 sales__img mt-5 mt-lg-0">
                <div class="sales__imgTextContent">
                    <p class="sales__imgTitle">Mid Season Sale - Upto 65% off</p>
                    <p class="sales__imgText">
                        Get upto 65% discount on your favorite products in mid-season summer sale on the entire stock
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonal Section -->
    <div class="testimonal sectionTopIcon text-light my-5">
        <div class="container">
            <div class="row py-5 mb-5">
                <div class="col-12">
                    <h1 class="text-center heading mt-5">
                        <span class="heading__main">WHAT CUSTOMERS SAID</span>
                        <span class="heading__sub">Top sale for all days</span>
                    </h1>
                </div>
                <div class="col-12 col-md-6 mt-md-5">
                    <div class="story row align-items-center p-md-3">
                        <div class="col-4 d-flex justify-content-center">
                            <figure class="story__shape">
                                <img src="{{ URL::asset('img/sectionBg/testimonials/zayntake2.webp') }}" alt=""
                                    class="story__img" />

                                <figcaption class="story__caption">Zayn Malik</figcaption>
                            </figure>
                        </div>
                        <div class="story__text col-8">
                            <h3 class="heading__teritary">Best Sportswear</h3>
                            <p>
                                Sportify have the best sportswear. I often buy several shirts and shoes from this store. The
                                quality of products is the best I have used in years.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mt-4 mt-md-5">
                    <div class="story row align-items-center p-md-3">
                        <div class="col-4 d-flex justify-content-center">
                            <figure class="story__shape">
                                <img src="{{ URL::asset('img/sectionBg/testimonials/selenataketwo.jpg') }}"
                                    alt="" class="story__img" />
                                <figcaption class="story__caption">Selena Gomez</figcaption>
                            </figure>
                        </div>
                        <div class="story__text col-8">
                            <h3 class="heading__teritary">Best Sports Store</h3>
                            <p>
                                This is undoubtedly the best sports store! I love to play tennis and have ordered tennis
                                eqipment countless times. The service and quality is amazing.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
