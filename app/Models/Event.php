<?php
/**
 * User: sasik
 * Date: 2/26/16
 * Time: 1:51 PM
 */

namespace App\Models;


class Event extends BaseModel
{

    /**
     * вошел
     */
    const TYPE_ENTER = 1;

    /**
     * вышел
     */
    const TYPE_EXIT = 2;

    public static $TYPES = [
        self::TYPE_ENTER => 'Вошел',
        self::TYPE_EXIT => 'Вышел',
    ];

    protected $fillable = [
        'card_number',
        'event_type_id',
    ];

    public function child()
    {
        return $this->hasOne(Child::class, 'card_number', 'card_number');
    }
}
