<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @package App
 * @property string name
 * @property string email
 * @property string password
 * @property string avatar
 * @property string provider
 * @property string provider_id
 * @property string access_token
 */
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'name',
            'email',
            'password',
            'avatar',
            'provider',
            'provider_id',
            'access_token',
        ];


//    public function property()
//    {
//        return $this->hasOne(UserProperty::class, 'user_id', 'id');
//    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden
        = [
            'password',
            'remember_token',
            'access_token',
        ];
}
