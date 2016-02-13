<?php
/**
 * User: sasik
 * Date: 2/8/16
 * Time: 12:24 PM
 */

namespace App\Models;


class Child extends BaseModel
{

    protected $table = 'children';

    protected $fillable = [
        'fio',
        'class',
        'class_char',
        'card_number',
        'city',
        'school_number',
    ];

    public static $rules = [
    	'fio' => 'required',
    	'class' => 'required',
    ];
}
