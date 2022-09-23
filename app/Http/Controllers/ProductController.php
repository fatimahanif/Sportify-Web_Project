<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Add to cart function
    public function addToCart(Request $request, $prodId)
    {
        if ($request->input("quantity") == null) {
            return redirect()->route('404');
        } else {
            $cart = new Cart();
            $cart->ProductId = $prodId;
            $cart->CustomerId = $request->session()->get("userId");
            $cart->quantity = $request->input("quantity");
            $cart->save();
            
            return redirect()->back();
        }
    }
}
