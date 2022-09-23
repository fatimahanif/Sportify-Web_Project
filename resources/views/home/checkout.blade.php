@extends('layout.template')

@section('nav-background')
<div class="about-bg">
    <img src="img/sectionBg/banner-top.jpg" alt="about bg" class="about-bg-img" width="100%">
</div>
@endsection

@section('page-layout')
<!--displaying checkout page-->
<div class="container-fluid text-center about-head" style="padding-top: 3%;">

    <h1 class="about-head-text">Checkout</h1>

    <hr class="about-hr offset-1 col-10">

</div>

<div class="container" style="padding-bottom: 3%;">
    <div class="row">
        <div class="col-lg-6 col-12">
            <h3>Billing Information</h3>
            <!-- <p>Name: <span id="ordername">Fatima Hanif</span> </p>
            <p>Address: <span id="orderaddress">House # 123, Street # 12, G-8/1, Islamabad</span></p>
            <p>Phone: <span id="orderphone">+923185152910</span></p>
            <p>Email: <span id="orderemail">fatimahanif303@gmail.com</span></p> -->

            @php
                $i = 0;
                $totalCost = 0;
            @endphp

            @foreach ($productArray as $product)
                    @php
                        $totalCost += $product->Price * $quantityArray[$i];
                    @endphp
                @endforeach

            <p>Total Amount: Rs. <span id="orderamount">{{ $totalCost }}</span>/-</p>

            <form action="/payment/{$payemntmethod}/{$cartIds}" method="get">
                <input type="text" name="name" id="name" value="{{$customer->FirstName}}" placeholder="Name" class="form-control">
                <br>
                <input type="text" name="address" id="address" value="{{$customer->address}}" placeholder="Address" class="form-control">
                <br>
                <input type="tel" name="phone" id="phone" value="+92{{$customer->PhoneNumber}}" placeholder="Phone" class="form-control">
                <br>
                <input type="email" name="email" id="email" value="{{$customer->Email}}" placeholder="Email" class="form-control">
                <br>
                <select name="payemntmethod" id="payemntmethod" class="form-control">
                    <option value="Cash">Cash-on-Delivery</option>
                    <option value="Card">Credit/Debit Card</option>
                </select>
                <br>
                <input type="text" name="cardnum" id="cardnum" class="form-control" placeholder="16 Digit Card Number" pattern="[0-9]{16}">

                <input class="btn btn-primary" type="submit" value="Confirm Payment">
            </form>
        </div>
        <div class="col-lg-6 col-12 align-self-center text-center">
            <h1>Thankyou for buying our products</h1>
        </div>
    </div>

</div>
@endsection