<?php
/**
 * User: sasik
 * Date: 2/26/16
 * Time: 1:43 PM
 */

namespace App\Http\Controllers\Api;


use App\Models\Event;
use App\Models\Repositories\ChildRepository;
use App\Models\Repositories\EventRepository;
use Illuminate\Http\Request;

class EventsController extends BaseController
{
    /**
     * EventsController constructor.
     */
    public function __construct()
    {
        $this->middleware('api', ['only' => ['getByCardNumber']]);
    }


    /**
     * @api {post} /events/  Сохранить событие
     * @apiName postEvent
     * @apiGroup Events
     *
     * @apiParam {Int} card_number Номер карточки ребенка
     * @apiParam {Int} event_type_id Тип события (Зашел = 1 / Вышел = 2)
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *
     * {
     * "card_number": "87771",
     * "event_type_id": "1",
     * "updated_at": "2016-02-26 15:31:31",
     * "created_at": "2016-02-26 15:31:31",
     * "id": 10
     * }
     *
     * сохранить событие от турникета
     * @param Request $request
     * @param EventRepository $eventRepository
     * @param ChildRepository $childRepository
     * @return static
     */
    public function postIndex(Request $request, EventRepository $eventRepository, ChildRepository $childRepository)
    {

        /**
         * проверим, есть ли ребенок с такой карточкой
         */
        $child = $childRepository->getChildByCardNumber($request->get('card_number'));
        if (!$child) {
            return response('That cardNumber doesnt exist!', 404);
        }

        return $eventRepository->create($request->all());
    }

    /**
     * @api {get} /events/by-card-number/:cardNumber  Получить события по номеру каточки
     * @apiName getByCardNumber
     * @apiGroup Events
     *
     * @apiParam {Int} cardNumber  Номер карточки
     *  @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
    [
        {
            "id": 1,
            "card_number": 87771,
            "event_type_id": 1,
            "created_at": "2016-02-26 15:01:51",
            "updated_at": "2016-02-26 15:01:51"
        },
        {
            "id": 2,
            "card_number": 87771,
            "event_type_id": 2,            "created_at": "2016-02-26 15:01:51",
            "updated_at": "2016-02-26 15:01:51"
        }
    ]
     *
     * @apiErrorExample Error-Response:
     * HTTP/1.1 500 Please enter a CARD NUMBER
     *
     *
     * @param Request $request
     * @param EventRepository $eventRepository
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getByCardNumber(Request $request, EventRepository $eventRepository, $cardNumber)
    {
//        $cardNumber = $request->get('card_number');
        if (!$cardNumber) {
            return response('Please enter a CARD NUMBER', 500);
        }

        return $eventRepository->getByCardNumber($cardNumber);

    }
}
