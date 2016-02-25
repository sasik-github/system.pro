<?php
/**
 * User: sasik
 * Date: 2/22/16
 * Time: 8:14 PM
 */

namespace App\Http\Controllers\Api;


use App\Models\Helpers\PasswordReseter;
use App\Models\Repositories\UserRepository;
use App\Models\User;

class AuthController extends BaseController
{
    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('api', ['only' => ['getAuthorization']]);
    }


    /**
     * @api {get} /auth/user-is-exist/:telephone Получить информации о пользователе, если он существует
     * @apiName getUserIsExist
     * @apiGroup Auth
     *
     * @apiParam {Number} telephone Уникальный номер телефона
     *
     *  @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
    {
        "id": 1,
        "name": "Alex",
        "telephone": "89516021698",
        "email": "dart_sas@mail.ru",
        "role_id": 1,
        "created_at": "2016-02-25 02:24:32",
        "updated_at": "2016-02-25 02:24:32"
    }
     *
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 User not Found
     */
    public function getUserIsExist($telephone, UserRepository $userRepository)
    {

        $user = $userRepository->getUserByTelephone($telephone);
        if (!$user) {
            return response('User not Found', 404);
        }

        return $user;
    }

    /**
     * @api {post} /auth/reset-password/:telephone Сбросить пароль у пользователя
     * @apiName postResetPassword
     * @apiGroup Auth
     *
     * @apiParam {Number} telephone Уникальный номер телефона, у кого сбрасываем пароль, на этот номер придет SMS с паролем
     *
     *  @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
        []
     *
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 User not Found
     */
    public function postResetPassword( $telephone, PasswordReseter $passwordReseter, UserRepository $userRepository)
    {
        $user = $userRepository->getUserByTelephone($telephone);

        if (!$user) {
            return response('User not Found', 404);
        }

        $passwordReseter->reset($user);
        return [];


    }

    /**
     * @api {get} /auth/authorization/ Пустой запрос авторизации
     * @apiName getAuthorization
     * @apiGroup Auth
     *
     * @apiDescription в Header простовляем Basic aутентификацию, что бы проверить telephone:pass, если все впорядке вернет 200, иначе 401
     *
     *  @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
        []
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 401
     */
    public function getAuthorization()
    {
        return [];
    }
}