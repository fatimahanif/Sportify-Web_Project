<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //login fucntion
    public function loginValidation(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $loginData = Customer::where('username', $username)->get();

        //checking password
        foreach ($loginData as $login) {
            if ($login->Password === $password) {
                // echo $login->password;
                $request->session()->put(["userId" => $login->id, "loggedInAs" => "customer"]);
                return redirect("index");
            } else {
                dd($login);
                // dd($request->input('password'));
            }
        }
    }

    public function signup(Request $request)
    {
        $customer = new Customer;

        $customer->UserName = $request->input('username');
        $customer->Email = $request->input('email');
        $customer->Password = $request->input('password');

        $customer->save();

        return redirect("index");

        // echo 'done';
    }

    //for admin
    public function adminValidation(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $loginData = Admin::where('username', $username)->get();

        //checking password
        foreach ($loginData as $login) {
            if ($login->Password === $password) {
                // echo $login->password;
                $request->session()->put(["userId" => $login->id, "loggedInAs" => "admin"]);
                return redirect('/admin');
            } else {
                dd($login);
                // dd($request->input('password'));
            }
        }
    }

}
