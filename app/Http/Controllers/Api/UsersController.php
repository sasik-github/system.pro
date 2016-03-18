<?php
/**
 * User: sasik
 * Date: 2/26/16
 * Time: 1:48 PM
 */

namespace App\Http\Controllers\Api;

use App\Models\Child;
use App\Models\ParentModel;
use App\Models\User;

class UsersController extends BaseController
{

    /**
     * @var User
     */
    private $user;

    /**
     * @var ParentModel
     */
    private $parent;

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->user = auth()->user();
        if ($this->user) {
            $this->parent = $this->user->parent;
        }

    }


    /**
     * @api {get} /users/info Получить данные о пользователе
     * @apiName getInfo
     * @apiGroup Users
     *
     *
     *  @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *
    {
        "id": 9,
        "name": "Иванов Иван Иванович",
        "telephone": "88002000600",
        "email": "",
        "role_id": 1,
        "created_at": "2016-02-26 15:08:48",
        "updated_at": "2016-02-26 15:01:51",
        "parent": {
            "id": 3,
            "user_id": 9,
            "fio": "Иванов Иван Иванович",
            "account": 999,
            "tariff_id": 5,
            "phone_type_id": 1,
            "created_at": "2016-02-26 15:01:51",
            "updated_at": "2016-02-26 15:01:51"
        }
    }
     * @return User
     */
    public function getInfo()
    {
        $user = $this->user;
        $parent = $this->user->parent()->with('tariff')->get();
        $user->parent = $parent;
        return $user;
    }

    /**
     * @api {get} /users/my-children Получить детей пользователя
     * @apiName getMyChildren
     * @apiGroup Users
     *
     *
     *  @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *
    [
        {
            "id": 3127,
            "fio": "Ребенок Иванова 2762",
            "card_number": 87771,
            "class": 10,
            "class_char": "A",
            "school_number": 51,
            "city": "Кемерово",
            "created_at": "2016-02-26 15:01:51",
            "updated_at": "2016-02-26 15:01:51",
            "pivot": {
                "parent_id": 3,
                "child_id": 3127
            }
        },
        {
            "id": 3128,
            "fio": "Ребенок Иванова 9444",
            "card_number": 95719,
            "class": 11,
            "class_char": "A",
            "school_number": 23,
            "city": "Кемерово",
            "created_at": "2016-02-26 15:01:51",
            "updated_at": "2016-02-26 15:01:51",
            "pivot": {
                "parent_id": 3,
                "child_id": 3128
            }
        }
    ]
     */
    public function getMyChildren()
    {

        if (!$this->parent) {
            /**
             * скорее всего это админ сайта
             */
            return [];
        }

        return $this->parent->children;
    }

}
