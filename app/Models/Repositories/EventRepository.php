<?php
/**
 * User: sasik
 * Date: 2/26/16
 * Time: 5:57 PM
 */

namespace App\Models\Repositories;


use App\Events\ChildEventWasCreated;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class EventRepository
{

    private static $eventTypeNames = [
        Event::TYPE_ENTER  => 'Вошел',
        Event::TYPE_EXIT => 'Вышел'
    ];

    public function getByCardNumber($cardNumber)
    {
        return Event::where('card_number', $cardNumber)->orderBy('updated_at', 'desc')->get();
    }

    /**
     * создаем событие от турникета, и вызываем События для рассылки пуш
     * @param $attributes
     * @return static
     */
    public function create($attributes)
    {
        $event = Event::create($attributes);
        event(new ChildEventWasCreated($event));
        return $event;
    }

    /**
     * @param $id int события
     * @return string название события
     */
    public static function getEventNameById($id)
    {
        if (!array_key_exists($id, self::$eventTypeNames)) {
            return 'Неизвестно';
        }

        return self::$eventTypeNames[$id];
    }

    /**
     * получаем все собыитя для $cardNumber и между двух дат
     *
     * @param $cardNumber
     * @param Carbon $firstDayOfMonth
     * @param Carbon $endDayOfMonth
     * @return Collection
     */
    private function getEventsBetweenDatesAndCardNumber($cardNumber, Carbon $firstDayOfMonth, Carbon $endDayOfMonth)
    {
        $events = Event::
            where('card_number', $cardNumber)
            ->where([
                ['created_at', '>=', $firstDayOfMonth->toDateTimeString()] ,
                ['created_at', '<=', $endDayOfMonth->toDateTimeString()]
            ])
            ->orderBy('created_at')
            ->get();

        return $events;
    }

    public function getEventsStatByCardNumberAndDate($cardNumber, Carbon $date)
    {
        $firstDayOfMonth = $date->copy()->startOfMonth();
        $endDayOfMonth = $date->copy()->endOfMonth();

        $events = $this->getEventsBetweenDatesAndCardNumber($cardNumber, $firstDayOfMonth, $endDayOfMonth);

        $eventSummaryByDate = $this->groupEventsByDayDate($events);

        $eventsSummaryByDateWithTime = $this->eventsSummarizeByDateWithTime($eventSummaryByDate);

        $dayStats = $this->mixWithMonthDays($eventsSummaryByDateWithTime, $firstDayOfMonth, $endDayOfMonth);
        
        return $dayStats;
    }

    /**
     * Группируем события по дате
     *  [date => [events...]]
     * @param Collection $events
     * @return array
     */
    private function groupEventsByDayDate(Collection $events)
    {

        $groupedEvents = [];
        foreach ($events as $event) {
            $key = $event->created_at->toDateString();
            $groupedEvents[$key][] = $event;
        }

        return $groupedEvents;
    }

    /**
     * на основании сгрупировоных по дате событий делайем статистику по Минутам прибывания в Школе
     *
     * @param array $groupedByDateEvents
     * @return array [date => minutes]
     */
    private function eventsSummarizeByDateWithTime(array $groupedByDateEvents = [])
    {

        $eventsSummaryByDateWithTime = [];
        foreach ($groupedByDateEvents as $dayDate => $eventsByOneDate) {
            /**
             * @var $startTime Carbon
             */
            $startTime = null;
            $time = 0;
            foreach ($eventsByOneDate as $event) {
                if ($event->event_type_id == Event::TYPE_ENTER) {
                    $startTime = $event->created_at;
                } else if ($startTime instanceof Carbon) {
                    $time += $startTime->diffInMinutes($event->created_at);
                }
            }
            $eventsSummaryByDateWithTime[$dayDate] = $time;
        }

        return $eventsSummaryByDateWithTime;
    }

    /**
     * Смешиваем с остальными датами месяца и заполняем их нулями
     *
     * @param $eventsSummaryByDateWithTime
     * @param $firstDayOfMonth
     * @param $endDayOfMonth
     * @return array
     */
    private function mixWithMonthDays($eventsSummaryByDateWithTime, $firstDayOfMonth, $endDayOfMonth)
    {
        $dayIterator = $firstDayOfMonth->copy();
        $daysStats = [];
        while($dayIterator->day != $endDayOfMonth->day) {
            $time = 0;
            if (array_key_exists($dayIterator->toDateString(), $eventsSummaryByDateWithTime)) {
                $time = $eventsSummaryByDateWithTime[$dayIterator->toDateString()];
            }
            $daysStats[$dayIterator->toDateString()] = $time;

            $dayIterator->addDay();
        }

        return $daysStats;
    }
}
