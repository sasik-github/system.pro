<?php
/**
 * User: sasik
 * Date: 2/26/16
 * Time: 5:57 PM
 */

namespace App\Models\Repositories;


use App\Models\Event;

class EventRepository
{

    public function getByCardNumber($cardNumber)
    {
        return Event::where('card_number', $cardNumber)->get();
    }
}