<?php
/**
 * User: sasik
 * Date: 2/9/16
 * Time: 4:32 PM
 */

namespace App\Models;


class About extends BaseModel
{
    public static $rules = [
        'text' => 'required',
    ];
    protected $table = 'about';

    protected $fillable = [
        'id',
        'text',
    ];

    /**
     * @return About
     */
    public static function getAbout()
    {
        return self::find(1);
    }

}
