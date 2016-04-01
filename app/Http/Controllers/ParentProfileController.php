<?php
/**
 * User: sasik
 * Date: 3/18/16
 * Time: 9:04 AM
 */

namespace App\Http\Controllers;



use App\Http\Middleware\Authenticate;
use App\Http\Middleware\ParentMiddleware;
use App\Models\Child;
use App\Models\ParentModel;
use App\Models\Repositories\ParentRepository;
use App\Models\Repositories\TariffRepository;
use App\Models\Tariff;
use Illuminate\Http\Request;

class ParentProfileController extends BaseController
{
    /**
     * @var ParentModel
     */
    private $parent;


    /**
     * ParentProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware(Authenticate::class);
        $this->middleware(ParentMiddleware::class);
    }

    public function getIndex(TariffRepository $tariffRepository)
    {
        $parent = $this->getParent();
        $tariffs = $tariffRepository->getTariffForSelect();

        $tariff = $parent->tariffs->first();

        return view('parentProfile.parentProfileIndex',
            compact('parent', 'tariffs', 'tariff')
            );
    }

    public function getEvents(Child $child)
    {
        
        return view('parentProfile.parentProfileEvents',
            compact('child')
            );
    }

    /**
     * @return ParentModel
     */
    private function getParent()
    {
        return auth()->user()->parent;
    }

    public function getChooseTariff(TariffRepository $tariffRepository)
    {
        $tariffs = $tariffRepository->getTariffsForUser();
        return view('parentProfile.parentProfileTariffs',
            compact('tariffs')
            );
    }

    public function postChooseTariff(Request $request, ParentRepository $parentRepository)
    {

        $tariff = Tariff::find($request->get('tariff_id'));
        $parent = $this->getParent();
        if (!$parentRepository->canBuyTariff($parent, $tariff)) {
            return redirect()
                ->action('ParentProfileController@getBuyTariffFail');
        }

        $parentRepository->chooseTariff($parent, $tariff);
        return redirect()
            ->action('ParentProfileController@getIndex');
    }


    public function getBuyTariffFail()
    {
        return view('parentProfile.parentProfileTariffFail',
            ['failMessage' => 'На вашем счету недостаточно средств!']
        );
    }
}