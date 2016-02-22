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

    public function getUserIsExist($telephone, UserRepository $userRepository)
    {

        $user = $userRepository->getUserByTelephone($telephone);

        return $user;
    }

    public function postResetPassword( $telephone, PasswordReseter $passwordReseter, UserRepository $userRepository)
    {
        $user = $userRepository->getUserByTelephone($telephone);

        if ($user) {
            $passwordReseter->reset($user);
        }
    }
}