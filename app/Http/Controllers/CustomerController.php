<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.accountCheck');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer;

        $customer->UserName = $request->input('username');
        $customer->Email = $request->input('email');
        $customer->Password = $request->input('password');

        $customer->save();

        // Creating a session
        $products = Product::all()->take(8);
        $request->session()->put(["userId" => $customer->id, "loggedInAs" => "customer"]);
        // return view("index", ["userId" => $customer->id, "products" => $products]);
        return redirect("index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $request->session()->forget("userId");
        return redirect("/index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view("customer.edit", ['userId' => $id, "customer" => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $customer = Customer::find($id);

        if ($customer) {
            // File Uploading
            if ($request->hasFile("userImage")) {
                // $this->validate($request, [
                //     'userImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                // ]);
                // get the name of the image
                // $imageName = $request->file("userImage")->getClientOriginalName();

                // Where to store the image of the customer
                // $request->file("userImage")->storeAs("storage/images", $imageName);

                $file = $request->file("userImage");
                // dump($file);
                $imageName = $file->getClientOriginalName();
                // dump($file->getClientOriginalExtension());
                // Storage::disk('public')->putFile("images", $file);
                $name = Storage::disk("public")->putFileAs("images", $file, $file->getClientOriginalName());
                // dump(Storage::disk("public")->url($name));
                // die;

                $customer->image = $imageName;
            }

            if ($request->filled('lname')) {
                $customer->LastName = $request->input("lname");
            }

            if ($request->filled('fname')) {
                $customer->FirstName = $request->input("fname");
            }

            if ($request->filled('uname')) {
                $customer->UserName = $request->input("uname");
            }

            if ($request->filled("pwd") && $request->filled("cpwd")) {
                if ($request->input("pwd") == $request->input("cpwd")) {
                    $customer->Password = $request->input("pwd");
                } else {
                    return "passwords doesnt match";
                }
            }

            if ($request->filled("phone")) {
                $customer->PhoneNumber = $request->input("phone");
            }

            if ($request->filled("address")) {
                $customer->PhoneNumber = $request->input("address");
            }
            $customer->save();
            //;
            return redirect()->route("customer.edit", ["customer" => $id]);
            // response()->json([
            //     'status' => 200,
            //     'message' => "Updated the profile successfully",
            // ])
        } else {
            return response()->json([
                'status' => 400,
                'message' => "Error Occured",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        dd($id);
        // $request->session()->forget("userId");
        // return redirect("/index");
    }

    // Customer Login
    //login fucntion
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $loginData = Customer::where('username', $username)->get();

        //checking password
        foreach ($loginData as $login) {
            if ($login->Password === $password) {
                // echo $login->password;
                $products = Product::all()->take(8);
                $request->session()->put(["userId" => $login->id, "loggedInAs" => "customer"]);
                // return view("index", ["userId" => $login->id, "products" => $products]);
                return redirect()->route("index", ["userId" => $login->id, "products" => $products]);
            } else {
                dd($login);
                // dd($request->input('password'));
            }
        }
    }


    public function orders($id){
        $customer = Customer::find($id);
        $orders = Order::where("CustomerID", "=", $customer->id)->get();
        // dd($orders);
        return view("customer.orders", ["userId"=>$id, "customer"=>$customer, "orders"=>$orders]);
    }

}
