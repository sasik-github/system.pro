<?php
/**
 * User: sasik
 * Date: 2/25/16
 * Time: 9:06 PM
 */

namespace App\Http\Controllers\Api;


use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;


class TokensController extends BaseController
{


//$table->string('token');
//$table->unsignedInteger('device_type_id');

    /**
     * @api {post} /token Сохранить токен устройства
     * @apiName postToken
     * @apiGroup Tokens
     *
     * @apiParam {String} token Уникальный token устройства из GCM или APNS
     * @apiParam {Int} device_type_id Тип устройства(ANDROID = 1, IOS = 2)
     *
     *  @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     */
    public function store(Request $request)
    {
        /**
         * @var $user User
         */
        $user = auth()->user();
        $attributes = $request->all();
        $attributes['user_id'] = $user->id;
        $token = Token::create($attributes);
        return $token;
    }
}
