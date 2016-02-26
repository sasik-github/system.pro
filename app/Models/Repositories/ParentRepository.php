<?php
/**
 * User: sasik
 * Date: 2/26/16
 * Time: 3:11 PM
 */

namespace App\Models\Repositories;


use App\Models\ParentModel;
use App\Models\Tariff;
use App\Models\User;

class ParentRepository
{

    /**
     * создать родителя
     *
     * @param $attributes
     *
     * @return ParentModel
     */
    public function create($attributes)
    {


        $user = User::create([
            'telephone' => $attributes['telephone'],
        ]);
        unset($attributes['telephone']);
        $parent = ParentModel::create($attributes);
        $parent->user_id = $user->id;
        $parent->save();

        return $parent;

    }
}