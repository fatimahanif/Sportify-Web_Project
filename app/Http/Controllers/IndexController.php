<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getUser(Request $request)
    {
        $userId = $request->session()->get("userId");
        $customer = Customer::find($userId);
        return $customer;
    }

    //function to render products
    public function renderProducts(Request $request)
    {

        if ($request->session()->has("userId")) {
            $customerId = $request->session()->get("userId");
            $customer = Customer::find($customerId);
            $array = $customer->carts;
            $productArray = array();
            $quantityArray = array();
            $cartIds = array();
            $i = 0;
            foreach ($array as $item) {
                $productArray[$i] = Product::find($item->ProductID);
                $quantityArray[$i] = $item->quantity;
                $cartIds[$i] = $item->id;
                $i++;
            }
            $products = Product::all()->take(8);
            $category = ProductCategory::all()->take(4);
            $customer = getUser($request);
            return view("index", ["products" => $products, "productArray" => $productArray, "quantityArray" => $quantityArray, "cartIds" => $cartIds, "category" => $category, "customer" => $customer]);

        } else {
            return redirect("/");
        }
    }

}
