<?php
/**
 * User: sasik
 * Date: 2/8/16
 * Time: 1:16 PM
 */

namespace App\Models;


class Tariff extends BaseModel
{
    protected $fillable = [
        'name',
        'price',
        'duration',
        'is_prilileged',
    ];
}
