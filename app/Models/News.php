<?php
/**
 * User: sasik
 * Date: 2/7/16
 * Time: 11:32 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    public static $rules = [
        'title' => 'required',
        'text' => 'required',
    ];
    protected $fillable = [
        'title',
        'text',
        'image',
    ];


}