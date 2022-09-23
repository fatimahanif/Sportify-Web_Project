@extends('layout.template')

@section('nav-background')
    <div class="about-bg">
        <img src="{{ asset('img/sectionBg/banner-top.jpg') }}" alt="about bg" class="about-bg-img" width="100%">
    </div>
@endsection

@section('page-layout')
    <!--displaying products of certian category-->
    <div class="container products-div">
        <div class="row">
            <div class="col-12">
                <h4 style="text-transform:uppercase">{{ $category->CategoryName }} Category</h4>

            </div>

            @foreach ($products as $product)
                <div class="col-md-3 col-6 product-col">
                    <div class="card product-card">
                        <a href="/products/{{ $product->id }}">
                            <img class="card-img-top" src="{{ asset('img/products') }}/{{ $product->Image }}"
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
        </div>
    </div>
@endsection
