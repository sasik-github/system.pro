<?php
/**
 * User: sasik
 * Date: 2/25/16
 * Time: 9:14 PM
 */

namespace App\Models;


class Token extends BaseModel
{

    const TYPE_ANDROID = 1;
    const TYPE_IOS = 2;

    protected $fillable = [
        'token',
        'device_type_id',
        'user_id',
    ];

    public $timestamps = false;

}
