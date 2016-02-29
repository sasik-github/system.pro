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
        return Token::where('token', $token)->firts();
    }
}
