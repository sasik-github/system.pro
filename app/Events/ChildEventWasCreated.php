<?php
/**
 * User: sasik
 * Date: 2/29/16
 * Time: 8:26 PM
 */

namespace App\Events;


use App\Models\Event as ChildEvent;
use Illuminate\Queue\SerializesModels;

class ChildEventWasCreated extends Event
{
    use SerializesModels;

    /**
     * @var ChildEvent
     */
    public $event;

    /**
     * EventWasCreated constructor.
     * @param ChildEvent $event
     */
    public function __construct(ChildEvent $event)
    {
        $this->event = $event;
    }


}
