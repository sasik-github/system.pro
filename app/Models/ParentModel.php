<?php
/**
 * User: sasik
 * Date: 2/8/16
 * Time: 12:40 PM
 */

namespace App\Models;



class ParentModel extends BaseModel
{
    public static $rules = [
        'fio' => 'required',
    ];

    protected $table = 'parents';

    protected $fillable = [
        'fio',
        'account',
        'tariff_id',
        'phone_type_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token::class, 'user_id', 'user_id');
    }

    public function children()
    {
        return $this->belongsToMany(Child::class, 'rel_parents_children', 'parent_id', 'child_id');
    }

//    public function tariff()
//    {
//        return $this->belongsTo(Tariff::class);
//    }

    public function tariffs()
    {
        return $this->belongsToMany(Tariff::class, 'rel_parents_tariff', 'parent_id', 'tariff_id')->withPivot('deleted_at', 'created_at');
    }

    public function getEmailAttribute($value)
    {
        return $this->user->email;
    }

    public function getNameAttribute($value)
    {
        return $this->user->name;
    }

    public function toArray()
    {
        $this->name;
        $this->email;
        return $res = parent::toArray();
    }

    /**
     * @param $value
     */
    public function setAccount($value)
    {
        $this->account = $this->account + $value;
    }


}
