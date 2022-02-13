<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Plan;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiCartController extends Controller
{

    use GeneralTrait;
    public function index()
    {
        $carts = Cart::where('customer_id' , auth()->user()->id)->with(
            ['plans']
        )->get();

        return $this->returnData('carts',$carts,'Data Retrieve Successfully');
    }// End Index
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $rules = [
                'plan' => 'required|exists:plans,id',
            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code , $validator);
            }
            $plan =  Plan::findOrFail($request->plan);
            $cart = Cart::create([
                'plan_id' => $plan->id,
                'plan_price' => $plan->plan_price,
                'discount_type' => $plan->discount_type,
                'discount' => $plan->discount,
                'customer_id' => auth()->user()->id,
            ]);
            DB::commit();

            return $this->returnSuccessMessage('Added To Cart Successfully');
        }
        catch (\Exception $e) {
            DB::rollback();
            return $this->returnError('E001' ,'Something Is invalid Try Again Later...' . $e->getMessage());
        }
    }// End Store


    public function destroy($id)
    {
      try{
        $planOfCart =  Cart::where('customer_id' , auth()->user()->id)->find($id);
          if(!$planOfCart) {
              return $this->returnError('412',"The Plan Of Your Cart Not Found Or Not Own It");
          }
          $planOfCart->delete();
      }catch (\Exception $e) {
          return $this->returnError('412' ,'Something Is invalid Try Again Later...' . $e->getMessage());

      }// End Try & Catch

    }// End Destroy
}
