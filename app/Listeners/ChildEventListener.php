<?php

namespace App\Listeners;

use App\Events\ChildEventWasCreated;
use App\Models\Child;
use App\Models\Event;
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

    private static $ENTER = '%s только что вошeл(ла) в школу %s';
    private static $EXIT = '%s только что вышел(ла) из школы %s';

    private static $SEX = [
        Child::SEX_FEMALE => 'ла',
        Child::SEX_MALE => 'ел',
    ];

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

        $this->handleEvent($event, $child);

    }

    private function handleEvent(Event $event, Child $child)
    {

        $child = $event->child;

        if (!$child) {
            return ;
        }

        $parents = $child->parents;

        $this->handleParents($parents, $event);
    }

    private function generatePushMessage(Event $event)
    {
        $message = '';
        switch ($event->event_type_id) {
            case Event::TYPE_ENTER:
                $message = self::$ENTER;
                break;
            case Event::TYPE_EXIT:
                $message = self::$EXIT;
                break;
            default:
                \Log::error("PushHandler", $event);
                return '';
        }

        return sprintf($message, $event->child->fio, $event->created_at);
    }

    private function generatePushData(Event $event)
    {
        return [
            'message' => $this->generatePushMessage($event),
            'child_id' => $event->child->id,
            'card_number' => $event->child->card_number,
            'type' => $event->event_type_id,
            'datetime' => $event->created_at->toDateTimeString(),
            'id' => $event->id,
        ];
    }

    private function handleParents($parents, Event $event)
    {
        $data = $this->generatePushData($event);

        foreach ($parents as $parent) {
            /**
             * @var $parent ParentModel
             */
            $this->handleParent($parent, $data);

        }
    }

    private function handleParent(ParentModel $parent, $data)
    {
        $tokens = $parent->tokens;
        foreach ($tokens as $token) {
            /**
             * @var $token Token
             */
            $response = $this->pushHandler->makePush($token, $data);

        }
    }
}
