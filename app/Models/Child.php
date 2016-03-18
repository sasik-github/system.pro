<?php
/**
 * User: sasik
 * Date: 2/8/16
 * Time: 12:24 PM
 */

namespace App\Models;


class Child extends BaseModel
{

    const SEX_MALE = true;
    const SEX_FEMALE = false;

    protected $table = 'children';

    protected $fillable = [
        'fio',
        'class',
        'class_char',
        'card_number',
        'city',
        'school_number',
        'sex'
    ];

    public static $rules = [
    	'fio' => 'required',
    	'class' => 'required',
    ];

    public $casts = [
        'sex' => 'boolean',
    ];

    public function parents()
    {
        return $this->belongsToMany(ParentModel::class, 'rel_parents_children', 'child_id', 'parent_id');
    }

    public function events()
    {
        return $this
            ->hasMany(Event::class, 'card_number', 'card_number')
            ->orderBy('created_at', 'desc');
    }
}
