<?php
/**
 * User: sasik
 * Date: 2/25/16
 * Time: 9:14 PM
 */

namespace App\Models;


class Token extends BaseModel
{

    protected $fillable = [
        'token',
        'device_type_id',
        'user_id',
    ];

    public $timestamps = false;

}
