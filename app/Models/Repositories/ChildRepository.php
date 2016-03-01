<?php
/**
 * User: sasik
 * Date: 2/28/16
 * Time: 9:59 PM
 */

namespace App\Models\Repositories;


use App\Models\Child;
use Illuminate\Support\Arr;

class ChildRepository
{

    public function getChildrenForSelect()
    {
        $array = [];
        foreach(Child::all() as $child) {
            $array[$child->id] = $child->fio . ' / ' . $child->card_number;
        }
        return $array;
    }

    /**
     * @param Child $child
     * @return Child
     */
    public function prepareForForm(Child $child)
    {
        $child->parent_id = $child->parents->pluck('id')->toArray();
        return $child;
    }

    public function update(Child $child, $attributes)
    {
        $child->update($attributes);

        $this->syncParents($child, $attributes);

        return $child;
    }

    public function create($attributes)
    {
        $child = Child::create($attributes);

        $this->syncParents($child, $attributes);

        return $child;
    }

    /**
     * @param Child $child
     * @param $attributes
     * @return Child
     */
    private function syncParents(Child $child, $attributes)
    {
        if (array_key_exists('parent_id', $attributes)) {
            $child->parents()->sync($attributes['parent_id']);
        }

        return $child;
    }

    /**
     * @param $cardNumber
     * @return Child
     */
    public function getChildByCardNumber($cardNumber)
    {
        return Child::where('card_number', $cardNumber)->first();
    }
}
