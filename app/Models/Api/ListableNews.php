<?php
/**
 * User: sasik
 * Date: 2/22/16
 * Time: 7:06 PM
 */

namespace App\Models\Api;


use App\Models\News;

class ListableNews extends News
{

    protected $hidden = [
        'text',
    ];
}