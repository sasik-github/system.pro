<?php
/**
 * User: sasik
 * Date: 2/26/16
 * Time: 1:48 PM
 */

namespace App\Http\Controllers\Api;

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
    }


    /**
     * @return User
     */
    public function getInfo()
    {
        return $this->user;
    }

    public function getMyChildren()
    {
        return $this->parent->children;
    }

}