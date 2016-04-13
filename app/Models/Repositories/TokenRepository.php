<?php
/**
 * User: sasik
 * Date: 2/29/16
 * Time: 11:08 PM
 */

namespace App\Models\Repositories;


use App\Models\Token;

class TokenRepository
{

    /**
     * @param $token
     * @return Token
     */
    public function getByToken($token)
    {
        return Token::where('token', $token)->first();
    }

    /**
     * @param $token
     * @param $deviceTypeId
     * @return Token|bool
     */
    public function isExist($token, $deviceTypeId)
    {
        $tokens = Token::where('token', $token)->get();

        foreach ($tokens as $token) {
            /**
             * @var $token Token
             */
            if ($token->device_type_id == $deviceTypeId) {
                return $token;
            }
        }

        return false;
    }
}
