<?php

namespace App\Http\Controllers\Front\Plan;

use App\Http\Controllers\Controller;
use App\Http\Middleware\AssignGuard;
use App\Models\Cart;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddToCartController extends Controller
{
    public function store(Request $request)
    {

        if(Auth('customer')->id() > 0) {
            $plan_id = $request->plan_id;
            $total_price = $request->total_price;
            $customer_id = Auth("customer")->id();


            $plan_check = Plan::where('id', $plan_id)->where('status', 1)->first();

                    if ($plan_check != null) {

                                       if (Cart::where('plan_id', $plan_id)->where('customer_id' , Auth("customer")->id())->exists()){

                                           return response()->json(["status" => $plan_check->name . "  Plan Already Have Been added To Cart"]);
                                       }

                        $cart = Cart::create([

                            "plan_id" => $plan_id,
                            "customer_id" => $customer_id,
                            "plan_price" => $total_price,
                            "discount" => $plan_check->discount,

                        ]);


                        //                   echo $cart->id;
                        //                   return response()->json(["status" => $plan_check->name . " Added To Cart"]);
                        return response()->json(['order' => $request->all(), 'status' => 'Congratulations, Plan Have Been Added Successfully']);
                        //               }
                    } else {
                        return response()->json(["status" => $plan_check->name . " Not Added"]);
                    }
                }else{
            return response()->json(["status" => " Please Login First" , "login" => '1']);

                }
        }


        /*******************************************/

    public function delete_cart(Request $request)
    {
        if(Auth('customer')->id() > 0) {
            $carts = Cart::where('customer_id', Auth('customer')->id())->get();
            if (count($carts) > 0) {
                foreach ($carts as $cart) {
                    $cart->delete();
                }
                return redirect()->back()->with('msg', 'You Have Deleted Your cart , Successfully');
            } else {
                return redirect()->back()->with('msg', 'Your Cart Is Already Empty');

            }
        }else{
            return redirect()->back()->with('msg', 'You Have To Login First To Delete Your cart');

        }
    }


}
