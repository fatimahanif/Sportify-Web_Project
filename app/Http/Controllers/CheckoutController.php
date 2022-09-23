<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;


use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function displayInfo(Request $request){}

    public function checkout(Request $request){
        // dd($request->session()->get("userId"));
        $customerId = request()->session()->get("userId");
        $customer = Customer::find($customerId);
        $array = $customer->carts;
        $productArray = array();
        $quantityArray = array();
        $cartIds = array();
        $i = 0;
        $price = 0;
        foreach ($array as $item) {
            $productArray[$i] = Product::find($item->ProductID);
            $quantityArray[$i] = $item->quantity;
            $cartIds[$i] = $item->id;
            $price += $productArray[$i]->Price * $quantityArray[$i];
            $i++;
        }

        //creating order
        $order = new Order();
        $order->CustomerID = $customerId;
        $order->OrderDate = date("Y-m-d");
        $order->OrderStatus = 'Pending';
        $order->PaymentMethod = $request->input("payemntmethod");
        $order->Price =  $price;

        $order->save();

        //adding order details
        $orderId = $order->id;
        $j = 0;
        foreach ($array as $item) {
            $orderDetail = new OrderDetail();
            $orderDetail->OrderID = $orderId;
            $orderDetail->ProductID = $productArray[$j]->id;
            $orderDetail->ProductQuantity = $quantityArray[$j];
            $orderDetail->save();
            $j++;
        }

        //deleting cart
        foreach($array as $cart){
            $cart->delete();
        }

        // dd($array);
        return redirect('/index');
    }

}
