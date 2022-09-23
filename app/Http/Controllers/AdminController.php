<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    //newly registered users
    public function newUsersRender()
    {
        $customers = Customer::all()->sortDesc()->take(6);
        $comments = Comment::all()->sortDesc()->take(3);
        // dd($comments);
        return view("admin.adminPanel", ["customers" => $customers, "comments" => $comments]);
    }

    public function renderCategories()
    {
        $categories = ProductCategory::all();
        return view("admin.addProduct", ["categories" => $categories]);
    }

    public function addCategory(Request $request)
    {
        $category = new ProductCategory;

        $category->CategoryName = $request->input('categoryName');
        $category->CategoryDescription = $request->input('description');

        $category->save();

        return view('admin.addCategory');
    }

    public function addProduct(Request $request)
    {

        // dump($request->hasFile("imagePost"));

        $product = new Product;

        $product->ProductName = $request->input('productName');
        $product->Price = $request->input('price');
        $product->ProductCategory = $request->input('category');
        $product->ProductDescription = $request->input('description');

        if ($request->hasFile("imagePost")) {


            $file = $request->file("imagePost");
            // dump($file);
            $imageName = $file->getClientOriginalName();

            $name = Storage::disk("public")->putFileAs("images", $file, $file->getClientOriginalName());


            $product->image = $imageName;
        }
        $product->save();

        $categories = ProductCategory::all();
        return view('admin.addProduct', ["categories" => $categories]);
    }

    // Render the product view Page
    public function renderProducts()
    {
        return view("admin.products");
    }

    // Render the categories view Page
    public function categories()
    {
        return view("admin.categories");
    }

    // fetch the products
    public function fetchProducts($take)
    {
        $products = Product::all()->take($take);
        return response()->json(
            ["products" => $products]
        );
    }

    // Delete the product
    public function deleteProduct($id)
    {

        $product = Product::find($id);
        $product->carts()->delete();
        $product->delete();

        return redirect()->back();

    }

    // fetch the category
    public function fetchCategories($take)
    {
        $categories = ProductCategory::all()->take($take);
        return response()->json(
            ["categories" => $categories]
        );
    }

    // Delete the category
    public function deleteCategories($id)
    {

        $categories = ProductCategory::find($id);
        $categories->delete();

        return redirect()->back();
    }
}
