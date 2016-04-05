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
use Carbon\Carbon;
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

        return $eventRepository->registerEvent($request, $childRepository);
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

    /**
     * @api {get} /events/stats?timestamp=:timestamp&card_number=:cardNumber  Получить стату для карточки
     * @apiName getStatsForMonth
     * @apiGroup Events
     *
     * @apiParam {Int} cardNumber  Номер карточки
     * @apiParam {Int} timestamp  таймстэмп даты, за какой месяц получить стату
     *  @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *
    {
        "2016-03-01": 0,
        "2016-03-02": 0,
        "2016-03-03": 0,
        "2016-03-04": 0,
        "2016-03-05": 0,
        "2016-03-06": 0,
        "2016-03-07": 0,
        "2016-03-08": 0,
        "2016-03-09": 0,
        "2016-03-10": 0,
        "2016-03-11": 0,
        "2016-03-12": 0,
        "2016-03-13": 0,
        "2016-03-14": 0,
        "2016-03-15": 0,
        "2016-03-16": 0,
        "2016-03-17": 0,
        "2016-03-18": 0,
        "2016-03-19": 0,
        "2016-03-20": 0,
        "2016-03-21": 0,
        "2016-03-22": 0,
        "2016-03-23": 0,
        "2016-03-24": 0,
        "2016-03-25": 0,
        "2016-03-26": 28,
        "2016-03-27": 0,
        "2016-03-28": 0,
        "2016-03-29": 69,
        "2016-03-30": 0
    }
     *
     * @apiErrorExample Error-Response:
     * HTTP/1.1 500 Please enter a CARD NUMBER
     *
     * @param Request $request
     * @param EventRepository $eventRepository
     * @return array
     */
    public function getStatsForMonth(Request $request, EventRepository $eventRepository)
    {

        $timestamp = $request->get('timestamp', time());
        $date = Carbon::createFromTimestamp($timestamp);
        $cardNumber = $request->get('card_number');

        return $eventRepository->getEventsStatByCardNumberAndDate($cardNumber, $date);
    }
}
