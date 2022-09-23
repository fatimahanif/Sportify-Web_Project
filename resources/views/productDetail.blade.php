@extends('layout.template')

@section('nav-background')
    <div class="about-bg">
        <img src="{{ asset('img/sectionBg/banner-top.jpg') }}" alt="about bg" class="about-bg-img" width="100%">
    </div>
@endsection


@section('page-layout')
    <!--product div-->
    <div class="container product-div">
        <div class="row">
            <div class="col-12 col-lg-6 text-center">
                <img src="{{ asset('storage/images/') }}/{{ $product->Image }}" alt="product image" class="product-img">
            </div>
            <div class="col-12 col-lg-6">
                <h3>{{ $product->ProductName }}</h3>
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
                <p>Rs. {{ $product->Price }}/-</p>
                <hr class="product-hr mx-auto">
                <p class="product-description">
                    {{ $product->ProductDescription }}
                </p>
                <form action="/products/{{ $product->id }}/cart">
                    <div class="row align-items-center">
                        <label for="quantity" class="col-lg-2 col-3 m-0 py-0">Quantity: </label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" max="20"
                            class="form-control col-3">
                    </div>

                    <br>
                    <input type="submit" value="Add to Cart" class="btn btn-info">
                </form>
            </div>
        </div>
    </div>

    <!--product description and reviews-->
    <div class="row my-5">
        <div class="col-12">
            <div class="row tabBtn_row">
                <div class="col-6 col-md-6 col-lg-3 offset-lg-3 text-center border-bottom tabBtn">
                    <button class="btn">description</button>
                </div>
                <div class="col-6 col-md-6 col-lg-3 text-center border-bottom tabBtn">
                    <button class="btn">Reviews</button>
                </div>
            </div>
        </div>
    </div>

    <!--div for content of tabs-->
    <div class="row col-12 col-lg-10 mx-auto">
        <div class="col-12 col-lg-12 tabsContainer">

            <!--description-->
            <div class="col-12 active-tab">
                <p class="">
                    A global video channel screening the best in culture
                </p>
                <p class="">
                    NOWNESS is a movement for creative excellence in storytelling celebrating the extraordinary of every
                    day. Launched in 2010, NOWNESS’ unique programming strategy has established it as the go to source of
                    inspiration and influence across art, design, fashion,
                    beauty, music, food, and travel. Our curatorial expertise and award-winning approach to storytelling is
                    unparalleled. We work with exceptional talent, and both established and emerging filmmakers, which
                    connects our audience to emotional
                    and sensorial stories designed to provoke inspiration and debate.
                </p>
                <p class="">
                    NOWNESS launched a Chinese-language site in 2012 and NOWNESS ASIA in 2020. Since 2013, videos are
                    available in up to 10 languages—including English, Chinese, French, German, Italian, Japanese, Korean,
                    Portuguese, Spanish and Russian (simply turn on subtitles
                    on our player)
                </p>
            </div>

            <!-- reviews   -->
            <div class="col-12">
                <p class="">
                    Below is some useful information to help you get started with the new features available on NOWNESS.
                </p>
                <p>What is the Video Queue and how do I use it?</p>
                <p class="">
                    You can create a queue of videos to watch later by clicking the + icon on any video thumbnail. The + is
                    also featured under the video player. If you are a registered member, your queue will be available when
                    you return.
                </p>
                <p>What is the Play button for?</p>
                <p class="">
                    Click the Play button in the top bar for the quickest accesses to videos in your queue, as well as those
                    Selected For You and the Most Recent and Most Popular films.
                </p>
            </div>

        </div>

    </div>

    <hr class="product-hr mx-auto">

    <!--related products-->
    <div class="container related-products-div">

        <div class="row">
            <div class="col-12 text-center">
                <h3>Related Products</h3>
            </div>
        </div>

        <div class="row product-row">

            @foreach ($relatedProducts as $product)
                <div class="col-md-3 col-6 related-product-col">
                    <div class="card product-card">
                        <a href="/products/{{ $product->id }}">
                            <img class="card-img-top" src="{{ asset('img/products/') }}/{{ $product->Image }}"
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

            {{-- <div class="col-md-3 col-6 related-product-col">
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

            <div class="col-md-3 col-6 related-product-col">
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

            <div class="col-md-3 col-6 related-product-col">
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



    </div>
@endsection
