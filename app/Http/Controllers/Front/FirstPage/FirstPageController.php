<?php

namespace App\Http\Controllers\Front\FirstPage;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class FirstPageController extends Controller
{
    public function index()
    {
        $plans = Plan::where('status' , 1)->latest()->paginate();
        return view('front.index' , ['plans'=>$plans]);
    }
}
