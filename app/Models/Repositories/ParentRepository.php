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
            'name' => $attributes['fio'],
        ]);
        unset($attributes['telephone']);
        
        $parent = ParentModel::create($attributes);
        $parent->user_id = $user->id;
        $parent->save();

        $this->syncChildren($parent, $attributes);

        return $parent;

    }

    public function update(ParentModel $parent, $attributes)
    {
        $parent->update($attributes);

        $this->syncChildren($parent, $attributes);

        return $parent;
    }

    /**
     *
     * привязать детей детей(удаляет лишнии свзяи, если их не было в Атрибутах)
     *
     * @param ParentModel $parent
     * @param $attributes
     * @return ParentModel
     */
    private function syncChildren(ParentModel $parent, $attributes)
    {
        if (array_key_exists('child_id', $attributes)) {
            $parent->children()->sync($attributes['child_id']);
        }

        return $parent;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getParentsForSelect()
    {
        return ParentModel::all()->pluck('fio', 'id');
    }

    /**
     * добовляет дополнительные поля их других таблиц
     * @param ParentModel $parent
     * @return ParentModel
     */
    public function prepareForForm(ParentModel $parent)
    {
        $parent->child_id = $parent->children->pluck('id')->toArray();
        $parent->telephone = $parent->user->telephone;
        return $parent;
    }


}
