<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserProperty
 *
 * @package App
 * @property integer id
 * @property integer user_id
 * @property string  sex
 * @property integer age
 * @property string  status
 */
class UserProperty extends Model
{
    protected $fillable
        = [
            'id',
            'sex',
            'age',
            'status',
        ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getStatusAttribute($key)
    {
        return $key ?? 'active';
    }

}
