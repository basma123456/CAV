<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Traits\ImageTrait;
use Carbon\Carbon;

//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;


class CustomerAuthController extends Controller
{
    use GeneralTrait,ImageTrait,AuthenticatesUsers;

//    protected $redirectTo = 'categories/0/0';

//    public function __construct()
//    {
////        $this->middleware('guest')->except('logout');
////        $this->middleware('guest:customer')->except('logout');
////        $this->middleware('guest:employee')->except('logout');
////        $this->middleware('guest:admins')->except('logout');
//
//    }

    protected function guard()
    {
        return Auth::guard('customer');
    }


    public function registerProcess(Request $request ) {
        try {
            $rules = [
                'fName' => 'required',
                'email' => 'required|email|unique:customers,email|unique:employees,email',
                'password' => 'required|confirmed|min:6|max:10',
                'password_confirmation' => 'required',
                'phone' => 'required|min:11|max:11',
                'nid'   => 'required|min:14|max:14|unique:customers,nid',
                'pic_nid' =>'required|mimes:jpeg,jpg,png|max:1000',
                'cr_no' => 'required_if:customer_type,=,company|mimes:jpeg,jpg,png|max:1000',
                'address' => 'required',
                'customer_type' =>'nullable|' . Rule::in(['personal','company']),

            ];

            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()) {
                return redirect('register_customer')
                    ->withErrors($validator)
                    ->withInput();
            }



            $client =   Customer::create([
                'full_name' =>  $request->fName . "  " . $request->lname,
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
                if($client) {
                    toastr()->success(__("global.success_create"));
                    return view('front.login.login');
                }
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

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Login



            if(is_numeric($request->get('email'))){
                $credentials = ['phone'=>$request->get('email'),'password'=>$request->get('password')];
            }
            elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
                $credentials = ['email' => $request->get('email'), 'password'=>$request->get('password')];
            }
//            $credentials = $request->only(['email_customer', 'password']);

            $customer =  Auth::guard("customer")->attempt($credentials);
            $myCustomer = Customer::find(Auth::guard("customer")->id());

            Auth('customer')->login($myCustomer);
            Auth::login($myCustomer);

            if(!$customer) {
                return redirect()->back()->with('msg' , 'بياتات الدخول غير صحيحة');

            }

            if($customer) {
                return redirect()->intended('categories/0/0');

            }


//            $data =  Auth::guard("api-seller")->user();
//            if($data->email_verify_token != NULL) {
//                return $this->returnError('E002', 'لا يمكن التسجيل يجب عليك توثيق البريد الالكترونى الخاص بك');
//            }
//            if($data->isVerified == 0) {
//                return $this->returnError('E003', 'لا يمكن التسجيل يجب عليك توثيق رقم الهاتف الخاص بك');
//            }

        }
        catch (\Exception $e) {
            return $this->returnError('',$e->getMessage());
        }
    }



}
