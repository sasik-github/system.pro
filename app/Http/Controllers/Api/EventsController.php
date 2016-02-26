<?php
/**
 * User: sasik
 * Date: 2/26/16
 * Time: 1:43 PM
 */

namespace App\Http\Controllers\Api;


use App\Models\Event;
use App\Models\Repositories\EventRepository;
use Illuminate\Http\Request;

class EventsController extends BaseController
{
    /**
     * EventsController constructor.
     */
    public function __construct()
    {
        $this->middleware('api', ['only' => ['getIndex']]);
    }


    /**
     *
     * сохранить событие от турникета
     * @param Request $request
     * @return static
     */
    public function postIndex(Request $request)
    {
        return Event::create([$request->all()]);
    }

    /**
     * получить события ребенка
     *
     * @param Request $request
     * @param EventRepository $eventRepository
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getIndex(Request $request, EventRepository $eventRepository, $cardNumber)
    {
//        $cardNumber = $request->get('card_number');
        if (!$cardNumber) {
            return response('Please enter a CARD NUMBER', 500);
        }

        return $eventRepository->getByCardNumber($cardNumber);

    }
}