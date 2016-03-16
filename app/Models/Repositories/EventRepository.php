<?php
/**
 * User: sasik
 * Date: 2/26/16
 * Time: 5:57 PM
 */

namespace App\Models\Repositories;


use App\Events\ChildEventWasCreated;
use App\Models\Event;

class EventRepository
{

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
}
