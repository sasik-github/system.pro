<?php
/**
 * User: sasik
 * Date: 3/23/16
 * Time: 8:44 PM
 */

namespace App\Http\Controllers;


use App\Models\Repositories\ParentRepository;
use App\Payments\Robokassa;
use Illuminate\Http\Request;

class PaymentController extends BaseController
{

    public function getIndex(Robokassa $robokassa)
    {

        $shpItem = 1;
        $invId = 2;
        $outSum = '100.00';
        $user = auth()->user();
        $robokassa->setUser($user);
        $crc = $robokassa->generateCRC($outSum, $invId, $shpItem);
        $button = $robokassa->makeButton($outSum, $invId, 'dafdf', $shpItem, $crc);

        return view('payment.paymentIndex', compact('button'));
    }
    
    public function postSuccess(Request $request, Robokassa $robokassa, ParentRepository $parentRepository)
    {
//        dd($request->all());
        if (!$robokassa->checkSuccessResponse($request->all())) {
            return 'bad';
        }
        $telephone = $request->get('Shp_login');

        $parent = $parentRepository->getParentByTelephone($telephone);
        $parent->setAccount($request->get('OutSum'));
        $parent->save();

    }

    public function postResult(Request $request, Robokassa $robokassa)
    {
        file_put_contents(public_path('robokassa.log'), var_export($request->all(), true));
        $robokassa->checkResultResponse($request->all());
    }

    public function postFail(Request $request)
    {
        dd($request->all());
    }
}
