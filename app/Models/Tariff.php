<?php
/**
 * User: sasik
 * Date: 2/8/16
 * Time: 1:16 PM
 */

namespace App\Models;


class Tariff extends BaseModel
{

    public static $rules = [
        'name' => 'required',
        'price' => 'required',
        'duration' => 'required',
    ];

    protected $fillable = [
        'name',
        'price',
        'duration',
        'is_privileged',
    ];

    protected $casts = [
        'is_privileged' => 'boolean',
        'duration' => 'integer',
        'price' => 'double',
    ];

    public static function toSelect()
    {
        $tarrifs = [];
        $tarrifs[] = 'Нет тарифа';
        
        $tarrifs = array_merge($tarrifs, self::all()->pluck('name', 'id')->toArray());
        return $tarrifs;
    }


}
