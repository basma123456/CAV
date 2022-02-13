<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Services\FatoorahService;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyFatoorahController extends Controller
{
    private $fatoorahService;

    public function __construct(FatoorahService $fatoorahService)
    {
        $this->fatoorahService = $fatoorahService;
    }

    public function payOrder(Request $request)
    {


            $my_data = Customer::where('id' , $request->customer_id)->first();

            $data = [
                "CustomerName" => $my_data->full_name,
                "NotificationOption" => 'Lnk', //'SMS', 'EML', or 'ALL'
                "InvoiceValue" => $request->post('total_price'),
                "CustomerEmail" => $my_data->email,
                "CallBackUrl" => env('fatoorah_success_url'),
                "ErrorUrl" => env('fatoorah_error_url'),
                "Language" => $request->getLocale(),
                "DisplayCurrencyIso" => "EGP"


            ];


        $status =  $this->fatoorahService->sendPayment($data);
             $link = $status['Data']['InvoiceURL'];
                return redirect($link);
        }

    /*****************************************************/

    public function callBack(Request $request)
    {
        dd('jjjjjjjjjjjjjjjjjjjjjjj');
    }
}
