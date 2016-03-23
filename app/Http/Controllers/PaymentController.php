<?php
/**
 * User: sasik
 * Date: 3/23/16
 * Time: 8:44 PM
 */

namespace App\Http\Controllers;


use App\Payments\Robokassa;
use Illuminate\Http\Request;

class PaymentController extends BaseController
{

    public function getIndex(Robokassa $robokassa)
    {

        $shpItem = 1;
        $invId = 2;
        $outSum = '100.00';
        $crc = $robokassa->generateCRC($outSum, $invId, $shpItem);
        $button = $robokassa->makeButton($outSum, $invId, 'dafdf', $shpItem, $crc);

        return view('payment.paymentIndex', compact('button'));
    }
    
    public function postSuccess(Request $request)
    {
        dd($request->all());
    }

    public function postResult(Request $request)
    {
        file_put_contents(public_path('robokassa.log'), var_export($request->all(), true));
    }

    public function postFail(Request $request)
    {
        dd($request->all());
    }
}
