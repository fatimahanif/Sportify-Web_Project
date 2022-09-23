<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentControler;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });

// Method for the cart
function cart(Request $request)
{
    if ($request->session()->has("userId")) {
        $customerId = request()->session()->get("userId");
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

        return array("productArray" => $productArray, "quantityArray" => $quantityArray, "cartIds" => $cartIds);

    } else {
        return null;
    }
}

function getUser(Request $request)
{
    $userId = $request->session()->get("userId");
    $customer = Customer::find($userId);
    return $customer;
}

Route::get('/', [CustomerController::class, "index"]);
// Index page(Home page)....................................
Route::get('/index', [IndexController::class, 'renderProducts'])->name("index");
// ABOUT PAGE.....................................
Route::get('/about', function (Request $request) {
    if (cart($request) != null) {
        $cartVar = cart($request);
        return view('home.about', ["productArray" => $cartVar["productArray"], "quantityArray" => $cartVar["quantityArray"], "cartIds" => $cartVar["cartIds"]]);
    } else {
        return redirect('/');
    }
})->name('home.about');

//CONTACT PAGE.....................................
Route::get('/contact', function (Request $request) {
    if (cart($request) != null) {
        $cartVar = cart($request);
        return view('home.contact', ["productArray" => $cartVar["productArray"], "quantityArray" => $cartVar["quantityArray"], "cartIds" => $cartVar["cartIds"]]);
    } else {
        return redirect('/');
    }
})->name("home.contact");
//SIGN In and SIGN Up Page ........................
Route::get('/accountCheck', function () {
    return view('accountCheck');
});


Route::get('/categories/', function (Request $request) {
    if (cart($request) != null) {
        // To get the last products
        $categories = ProductCategory::all();
        $cartVar = cart($request);
        return view('categoryPage', ["categories" => $categories, "productArray" => $cartVar["productArray"], "quantityArray" => $cartVar["quantityArray"], "cartIds" => $cartVar["cartIds"]]);

    } else {
        return redirect('/');
    }
})->name("categories.index");

// #################  Product ROUTES #########################
Route::get('/products/{prodId}', function (Request $request, $prodId) {
    if (cart($request) != null) {
        // To fin the certain products by id
        $product = Product::find($prodId);
        // To find the related product (It will also show the product as well   )
        $relatedProducts = Product::where("ProductCategory", $product->ProductCategory)->take(4)->get();
        $cartVar = cart($request);
        return view('productDetail', ['product' => $product, "relatedProducts" => $relatedProducts, "productArray" => $cartVar["productArray"], "quantityArray" => $cartVar["quantityArray"], "cartIds" => $cartVar["cartIds"]]);

    } else {
        return redirect('/');
    }

});

Route::get('/products/', function (Request $request) {
    if (cart($request) != null) {
        // To get the last products
        $products = Product::orderBy('id', 'DESC')->take(4)->get();
        $productsTop = Product::orderBy('rating', 'DESC')->take(4)->get();
        $cartVar = cart($request);
        return view('productPage', ["products" => $products, "productArray" => $cartVar["productArray"], "quantityArray" => $cartVar["quantityArray"], "cartIds" => $cartVar["cartIds"], "productsTop"=>$productsTop]);

    } else {
        return redirect('/');
    }
})->name("products.index");

Route::get("/products/{prodId}/cart", [ProductController::class, "addToCart"]);
Route::get("/products/category/{catId}", function (Request $request, $catId) {
    if (cart($request) != null) {
        // $catId = Crypt::decrypt($catId);
        $category = ProductCategory::find($catId);
        // dump($catId["id"]);
        // die;
        $products = Product::where("ProductCategory", '=', $catId)->take(12)->get();
        // dump($products);die;
        $cartVar = cart($request);
        return view('product.productCategoryDetail', ["productArray" => $cartVar["productArray"], "quantityArray" => $cartVar["quantityArray"], "cartIds" => $cartVar["cartIds"], "category" => $category, "products" => $products]);
    } else {
        return redirect('/');
    }

    // return view("product.productCategoryDetail");

})->name("products.category");

Route::get("/products/search/product", function (Request $request) {
    $search = $request->product;
    $products = Product::where('ProductName', 'like', '%' . $request->product . '%')->get();
    $cartVar = cart($request);
    return view('product.productSearch', ["productArray" => $cartVar["productArray"], "quantityArray" => $cartVar["quantityArray"], "cartIds" => $cartVar["cartIds"], "products" => $products, "search" => $search]);

})->name("product.search");
// Customer Controller (resource Controller) Plus additional Controller
Route::resource('/customer', CustomerController::class);
Route::post('/customer/check/login', [CustomerController::class, "login"])->name("customer.login");
Route::get('/customer/{id}/orders',[CustomerController::class, "orders"])->name("customer.orders");

// ########################## for the admin pannel #######################

Route::prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'newUsersRender']);
    Route::get("/products/", [AdminController::class, "renderProducts"])->name("admin.products");
    Route::get("/categories/", [AdminController::class, "categories"])->name("admin.categories");
    Route::get('/addProduct', [AdminController::class, 'renderCategories']);
    // Route::post('/addProduct/{productName}/{price}/{category}/{imagePost}/{description}', [AdminController::class, 'addProduct']);
    // Route::post('/addProduct/{productName}/{price}/{category}/{imagePost}/{description}', [AdminController::class, 'addProduct']);

    Route::post('/addProduct/new', [AdminController::class, 'addProduct'])->name("admin.addNewProduct");


    // Route::post('/addCategory/{categoryName}/{description}', [AdminController::class, 'addCategory']);
    Route::post('/addCategory/{categoryName}/{description}', [AdminController::class, 'addCategory']);
    Route::get('/addCategory', function () {
        return view('admin.addCategory');
    });

    Route::get('/login', function () {
        return view('admin.login');
    });
    // Route::post('/login/checkAdmin/{username}/{password}', [LoginController::class, 'adminValidation']);
    Route::post('/login/checkAdmin/{username}/{password}', [LoginController::class, 'adminValidation']);

    // Route::get('/adminPanel', function () {
    //     return view('admin.adminPanel');
    // });

    // Ajax Stuff (PRODUCTS)
    Route::get("/products/fetch/{take}", [AdminController::class, "fetchProducts"]);
    Route::get('/products/delete/{productId}', [AdminController::class, "deleteProduct"]);

    Route::get("/categories/fetch/{take}", [AdminController::class, "fetchCategories"]);
    Route::get('/categories/delete/{productId}', [AdminController::class, "deleteCategories"]);
});

// 404 Page

Route::get('/404', function () {
    return view('404Page');
})->name("404");

// For the cart

// Ajax

Route::get("products/ajax/fetch", function (Request $request) {
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
    return response()->json([
        'productArray' => $productArray,
        'quantityArray' => $quantityArray,
        'cartIds' => $cartIds,
    ]);
})->name("cart.fetchProduct");

Route::delete('/products/cart/delete/{cartId}', function ($id) {
    Cart::find($id)->delete();

    return response()->json([
        'status' => 200,
        'message' => "cart item was deleted",
    ]);
})->name('cart.delete');

//################checkout#################
Route::get('/checkout', function (Request $request) {
    $cartVar = cart($request);
    $customerId = request()->session()->get("userId");
    $customer = Customer::find($customerId);
    return view('home.checkout', ["customer" => $customer, "productArray" => $cartVar["productArray"], "quantityArray" => $cartVar["quantityArray"], "cartIds" => $cartVar["cartIds"]]);
})->name('home.checkout');

Route::get('/payment/{payemntmethod}/{cartIds}', [CheckoutController::class, 'checkout']);


//comments
Route::post('/comment/{fName}/{lName}/{email}/{phoneNo}/{subject}/{message}', [CommentControler::class, 'addComment'])->name('customer.addComment');