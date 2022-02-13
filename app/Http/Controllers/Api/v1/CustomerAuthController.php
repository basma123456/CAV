<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Traits\ImageTrait;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Tymon\JWTAuth\Facades\JWTAuth;
class CustomerAuthController extends Controller
{
    use GeneralTrait,ImageTrait;
    public function registerProcess(Request $request ) {
        try {
            $rules = [
                'fName' => 'required',
                'email' => 'required|email|unique:customers,email|unique:employees,email',
                'password' => 'required|min:6|max:10',
                'phone' => 'required|min:11|max:11',
                'nid'   => 'required|min:14|max:14|unique:customers,nid',
                'pic_nid' =>'required|mimes:jpeg,jpg,png|max:1000',
                'cr_no' => 'required_if:customer_type,=,company|mimes:jpeg,jpg,png|max:1000',
                'address' => 'required',
                'customer_type' =>'required|' . Rule::in(['personal','company']),

            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code , $validator);
            }
            $client =   Customer::create([
                'full_name' =>  $request->fName,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'nid' => $request->nid,
                'address' => $request->address,
                'customer_type' => $request->customer_type,
                'pic_nid' => $this->imageStore($request->pic_nid,'cav','Customers'),
                'cr_no' => $request->customer_type == 'company' ?  $this->imageStore($request->cr_no,'cav','Customers') : '',
                'status' => 1,
            ]);
            if($client) {
                return $this->returnSuccessMessage('Created Successfully');
            }
        }
        catch (\Exception $e) {

            return $this->returnError('E001' ,'Something Is invalid Try Again Later...' . $e->getMessage());
        }
    }// End Index
    public function login(Request $request) {
        try{
            $rule = [
                'email' => 'required',
                'password' => 'required'
            ];
            $validator = Validator::make($request->all(),$rule);

            if($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code , $validator);
            }

            // Login
            $credentials = $request->only(['email', 'password']);
            $customer =  Auth::guard("api-customer")->attempt($credentials);

            if(!$customer) {
                return $this->returnError('E001', 'بيانات الدخول غير صحيحة');
            }
//            $data =  Auth::guard("api-customer")->user();
//            if($data->email_verify_token != NULL) {
//                return $this->returnError('E002', 'لا يمكن التسجيل يجب عليك توثيق البريد الالكترونى الخاص بك');
//            }
//            if($data->isVerified == 0) {
//                return $this->returnError('E003', 'لا يمكن التسجيل يجب عليك توثيق رقم الهاتف الخاص بك');
//            }
            $data['token'] = $customer;
            return $this->returnData("LoginInfo", $data);
        }
        catch (\Exception $e) {
            return $this->returnError('',$e->getMessage());
        }
    }// End Login

    public function profile(Request $request) {
        $token = $request->header('auth-token');
        return auth()->user();
    }// End Profile

    public function logout(Request $request) {
        $token = $request->header('auth-token');
        if($token) {
            try{
                JWTAuth::setToken($token)->invalidate(); // Logout
                return $this->returnSuccessMessage("Logout Successfully");
            }
            catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                return   $this->returnError("", "Something went wrong....." );
            }
        }
        else {
            return   $this->returnError("", "Something went wrong.....");
        }
    }
}
