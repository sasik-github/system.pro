<?php
/**
 * User: sasik
 * Date: 2/8/16
 * Time: 12:40 PM
 */

namespace App\Models;

use App\Models\User;


class ParentModel extends BaseModel
{
    public static $rules = [
        'fio' => 'required',
    ];

    protected $table = 'parents';

    protected $fillable = [
        'fio',
        'account',
        'tariff_id',
        'phone_type_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function children()
    {
        return $this->belongsToMany(Child::class, 'rel_parents_children', 'parent_id', 'child_id');
    }

    public function tariff()
    {
        return $this->belongsTo(Tariff::class);
    }
}
