<?php
/**
 * User: sasik
 * Date: 2/8/16
 * Time: 12:40 PM
 */

namespace App\Models;


class ParentModel extends BaseModel
{
    protected $table = 'parents';

    protected $fillable = [
        'fio',
        'account',
        'tariff_id',
        'phone_type_id',
    ];
}
