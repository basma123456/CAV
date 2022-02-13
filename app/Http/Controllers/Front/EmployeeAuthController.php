<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Traits\GeneralTrait;
use App\Traits\ImageTrait;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class EmployeeAuthController extends Controller
{
    use GeneralTrait ,ImageTrait, AuthenticatesUsers;


//    protected $redirectTo = 'categories/0/0';
//
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//        $this->middleware('guest:employee')->except('logout');
//
//    }



    public $user_info;

    public function __construct(){
        $this->middleware('guest')->except('logout');

        $this->middleware(function ($request, $next) {
            $this->user_info=Auth::guard('employee')->user(); // returns user
            return $next($request);
        });
    }


    protected function guard()
    {
        return Auth::guard('employee');
    }



    public function registerProcess(Request $request ) {

        try {

            $rules = [
                'fName' => 'required',
                'email' => 'required|unique:employees,email|unique:customers,email',
                'pass' => 'required|confirmed|min:6|max:10',
                'nid' => 'required|max:14|min:14|unique:employees,email',
                'phone' => 'required|max:11|min:11|unique:employees,phone',
                'avatar' => 'required|mimes:jpeg,jpg,png|max:1000',
                'pic_nid' =>'required|mimes:jpeg,jpg,png|max:1000',

            ];

//            dd($request->all());

            $validator = Validator::make($request->all(),$rules);


            if ($validator->fails()) {
                return redirect('register_seller')
                    ->withErrors($validator)
                    ->withInput();
            }



            $randomSerialNumber = Str::random(2) . random_int(1000, 9999);
            $client =   Employee::create([
                'full_name' => $request->fName,
                'email' => $request->email,
                'password' => bcrypt($request->pass),
                'phone' => $request->phone,
                'nid' => $request->nid,
                'avatar' => $this->imageStore($request->avatar,'cav','Employee'),
                'pic_nid' =>  $this->imageStore($request->pic_nid,'cav','Employee'),
                'roles' => '-',
                'department_id' =>  1,
                'balance' => 0,
                'personal_id' => $randomSerialNumber,
            ]);

            if($client) {
                toastr()->success(__("global.success_create"));
                return view('front.login.login');
            }

        }
        catch (\Exception $e) {

            return $this->returnError('E001' ,'Something Is invalid Try Again Later...' . $e->getMessage());
        }// End RegisterProcess

    }

    /********************************************************************************/
    public function verifyEmail(Request $request) {
        $token = $request->token;

        $user = Employee::where('email_verify_token', $token)->whereNotNull('email_verify_token')->first();

        if (empty($user)) {
            return $this->returnSuccessMessage("Your Email Already Verified");
        }
        $user->email_verify_token = null;
        $user->email_verified_at = Carbon::now();
        $user->update( );
    }
    /***********************************************************************************/
    /**********************************************************************/

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

            $employee =  Auth::guard("employee")->attempt($credentials);


            if(!$employee) {
                return redirect()->back()->with('msg' , 'بياتات الدخول غير صحيحة');

            }


            if($employee) {
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


    /**************************************************************************************/
}
