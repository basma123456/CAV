<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Auth;

class AdminAuthController extends Controller
{


   public function index() {

      return view("auth.login");
   }
   public function login(Request $request) {
       $user =  $request->validate([
           'email' => 'required|email|exists:admins,email',
           'password' => 'required'
       ]);
       $credentials = $request->only(['email', 'password']);
       $admin =  Auth::guard("admins")->attempt($credentials);

       if($admin) {
           return redirect()->intended('dashboard/home');

       }

       return back();
   }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('dashboard/login');
    }
}
