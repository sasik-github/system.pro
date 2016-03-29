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

    public function makePush(Token $token, $data)
    {
        $response = $this->sendPushByType($token->token, $token->device_type_id, $data);
        $code = ResponseCode::fromResponse($response);

        if (ResponseCode::NOT_REGISTERED === $code || ResponseCode::UNKNOWN_ERROR === $code) {
            $token->delete();
        }
        \Log::debug('PushHandler:Response', [ResponseCode::getMessageFromCode($code)]);
        return ResponseCode::getMessageFromCode($code);

    }

    private function sendPushByType($token, $type, $data)
    {
        if ($type ==  Token::TYPE_ANDROID) {
            return CloudMessaging::sendToAndroid($token, $data);
        }

        if (Token::TYPE_IOS == $type) {
            return CloudMessaging::sendToIOS($token, $data);
        }
    }

    
}
