<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Traits\GeneralTrait;
use App\Traits\ImageTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;


class EmployeeAuthController extends Controller
{
    use GeneralTrait ,ImageTrait;

    public function registerProcess(Request $request ) {

        try {
            $rules = [
                'fName' => 'required',
                'email' => 'required|unique:employees,email|unique:customers,email',
                'pass' => 'required|min:6|max:10',
                'nid' => 'required|max:14|min:14|unique:employees,email',
                'phone' => 'required|max:11|min:11|unique:employees,phone',
                'avatar' => 'required|mimes:jpeg,jpg,png|max:1000',
                'pic_nid' =>'required|mimes:jpeg,jpg,png|max:1000',

            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code , $validator);
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
                return $this->returnSuccessMessage('Created Successfully');
            }
        }
        catch (\Exception $e) {

            return $this->returnError('E001' ,'Something Is invalid Try Again Later...' . $e->getMessage());
        }// End RegisterProcess

    }
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

    public function login(Request $request) {


        try{
            $rule = [
                'email' => 'required|email',
                'password' => 'required'
            ];
            $validator = Validator::make($request->all(),$rule);

            if($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code , $validator);
            }

            // Login
            $credentials = $request->only(['email', 'password']);
            $employee =  Auth::guard("api-employee")->attempt($credentials);

            if(!$employee) {
                return $this->returnError('E001', 'بيانات الدخول غير صحيحة');
            }
//            $data =  Auth::guard("api-seller")->user();
//            if($data->email_verify_token != NULL) {
//                return $this->returnError('E002', 'لا يمكن التسجيل يجب عليك توثيق البريد الالكترونى الخاص بك');
//            }
//            if($data->isVerified == 0) {
//                return $this->returnError('E003', 'لا يمكن التسجيل يجب عليك توثيق رقم الهاتف الخاص بك');
//            }
            $data['token'] = $employee;
            return $this->returnData("LoginInfo", $data);
        }
        catch (\Exception $e) {
            return $this->returnError('',$e->getMessage());
        }
    }

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

    public function profile(Request $request) {
        $token = $request->header('auth-token');
        return auth()->user();
    }

//    protected function verify(Request $request)
//    {
//        $data = $request->validate([
//            'verification_code' => ['required', 'numeric'],
//            'phone_number' => ['required', 'string'],
//        ]);
//        /* Get credentials from .env */
//        $token_sms = getenv("TWILIO_AUTH_TOKEN");
//        $twilio_sid = getenv("TWILIO_SID");
//        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
//        $twilio = new Client($twilio_verify_sid, $token_sms);
//        $verification = $twilio->verify->v2->services($twilio_sid)
//            ->verificationChecks
//            ->create($data['verification_code'], array('to' => $data['phone_number']));
//        if ($verification->valid) {
//            $user = tap(Customer::where('phone', $data['phone_number']))->update(['isVerified' => true]);
//            /* Authenticate user */
////            Auth::login($user->first());
//
//            return $this->returnSuccessMessage("Phone number verified");
//        }
//
//        return $this->returnError("","Invalid verification code entered!");
//    }

}
