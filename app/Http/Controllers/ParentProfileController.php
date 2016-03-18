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
use App\Models\Repositories\TariffRepository;

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

        return view('parentProfile.parentProfileIndex',
            compact('parent', 'tariffs')
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
}