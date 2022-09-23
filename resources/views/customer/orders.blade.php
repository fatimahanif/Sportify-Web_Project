@include('layout.partial.userCheck')
@extends('layout.adminTemplate')


@section('title', "Edit $customer->UserName Profile")

{{-- vertical bar --}}
@section('linkOne', '')
@section('linkOneIcon', 'fa-user')
@section('linkTitleOne', 'Profile Setting')

@section('linkTwo', "orders")
@section('linkTwoIcon', 'fa-square-rss')
@section('linkTitleTwo', 'Orders')


@section('scriptOne')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

@endsection
@section('scriptTwo')
    <script src="{{ asset('scripts/customerAjax.js') }}"></script>
@endsection



@section('page-content')
    <div class="col-10 my-5">

        <h3>Orders</h3>

        <div class="accordion accordion-flush" id="accordionFlushExample">
        

        <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading">
                <button id="order-head" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsed" aria-expanded="false" aria-controls="flush-collapse">
                    <table class="w-100">
                        <tr>
                            <th class="order-row">ID</th>
                            <th class="order-row">Date</th>
                            <th class="order-row">Status</th>
                            <th class="order-row">Payment Method</th>
                            <th class="order-row">Payment Status</th>
                            <th class="order-row">Price</th>
                            <td class="order-btn "></td>
                        </tr>
                    </table>
                    
                </button>
                </h2>
                <div id="flush-collapse" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body"></div>
                </div>
            </div>

        @foreach ($orders as $order)
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading{{$order->id}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$order->id}}" aria-expanded="false" aria-controls="flush-collapse{{$order->id}}">
                        <table class="w-100">
                            <tr>
                                <td class="order-row" style="font-weight: bold;">Order#{{$order->id}}</td>
                                <td class="order-row">{{$order->OrderDate}}</td>
                                <td class="order-row">{{$order->OrderStatus}}</td>
                                <td class="order-row">{{$order->PaymentMethod}}</td>
                                <td class="order-row">{{$order->PaymentStatus}}</td>
                                <td class="order-row">Rs. {{$order->Price}}</td>
                                <td class="order-btn btn btn-primary w-100">Details</td>
                            </tr>
                        </table>
                        
                    </button>
                </h2>
                <div id="flush-collapse{{$order->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$order->id}}" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">

                    @php
                        $details = DB::table('OrderDetails')->select('ProductID', 'ProductQuantity', 'Products.ProductName')->join('Products', 'OrderDetails.ProductID', '=', 'Products.id')->where('OrderID', $order->id)->get();
                    @endphp

                    <h4>Order Details</h4>
                    <table class="w-50 text-center">
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                        </tr>
                        @foreach ($details as $detail)
                            <tr>
                                <td>{{$detail->ProductID}}</td>
                                <td>{{$detail->ProductName}}</td>
                                <td>{{$detail->ProductQuantity}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                </div>
            </div>
        @endforeach

        </div>
    
    </div>
@endsection
