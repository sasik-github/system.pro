<?php
/**
 * User: sasik
 * Date: 2/29/16
 * Time: 8:51 PM
 */

namespace App\Push;


use App\Models\Child;
use App\Models\Event;
use App\Models\ParentModel;
use App\Models\Token;
use Sasik\GCM\CloudMessaging;
use Sasik\GCM\ResponseCode;

class PushHandler
{

    private static $ENTER = '%s только что вош%s в школу %s';
    private static $EXIT = '%s только что выш%s из школы %s';

    private static $SEX = [
        Child::SEX_FEMALE => 'ла',
        Child::SEX_MALE => 'ел',
    ];


    public function handle(Event $event, Child $child)
    {

        $child = $event->child;

        if (!$child) {
            return ;
        }

        $parents = $child->parents;

        $this->handleParents($parents, $event);
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
            $response = $this->makePush($token, $data);

        }
    }

    private function makePush(Token $token, $data)
    {
        $response = CloudMessaging::send($token->token, $data);
        $code = ResponseCode::fromResponse($response);

        if (ResponseCode::NOT_REGISTERED === $code || ResponseCode::UNKNOWN_ERROR === $code) {
            $token->delete();
        }
        \Log::debug('PushHandler:Response', [ResponseCode::getMessageFromCode($code)]);
        return ResponseCode::getMessageFromCode($code);

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

        return sprintf($message, $event->child->fio, self::$SEX[$event->child->sex], $event->created_at);
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
}
