<?php

namespace App\Listeners;

use App\Events\ChildEventWasCreated;
use App\Models\ParentModel;
use App\Models\Token;
use App\Push\PushHandler;

/**
 * User: sasik
 * Date: 2/29/16
 * Time: 8:29 PM
 */
class ChildEventListener
{

    /**
     * @var PushHandler
     */
    private $pushHandler;

    /**
     * ChildEventListener constructor.
     * @param PushHandler $pushHandler
     */
    public function __construct(PushHandler $pushHandler)
    {
        $this->pushHandler = $pushHandler;
    }

    public function handle(ChildEventWasCreated $childEvent)
    {
        $event = $childEvent->event;

        $child = $event->child;

        $this->pushHandler->handle($event, $child);

    }
}
