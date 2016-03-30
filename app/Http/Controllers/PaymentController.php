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
            return redirect()
                ->action('PaymentController@postFail');
        }

        $telephone = $request->get('Shp_login');
        $summ = $request->get('OutSum');

//        $parent = $parentRepository->getParentByTelephone($telephone);
//        $parent->setAccount($summ);
//        $parent->save();

        return view('payment.paymentSuccess',
            compact('summ')
            );

    }

    public function postResult(Request $request, Robokassa $robokassa, ParentRepository $parentRepository)
    {
        file_put_contents(storage_path('logs/robokassa-all.log'), var_export($request->all(), true));
        if (!$robokassa->checkResultResponse($request->all())) {
            return 0;
        }

        $telephone = $request->get('Shp_login');
        $summ = $request->get('OutSum');
        file_put_contents(storage_path('logs/robokassa-success.log'), var_export($request->all(), true));
        $parent = $parentRepository->getParentByTelephone($telephone);
        $parent->setAccount($summ);
        $parent->save();

        return 1;

    }

    public function postFail(Request $request)
    {
        return view('payment.paymentFail');
    }
}
