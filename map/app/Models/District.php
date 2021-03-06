<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class District
 *
 * @package App\Models
 * @property int    id
 * @property string name
 * @property int    city_id
 * @property City    city
 */
class District extends Model
{
    protected $fillable = ['name', 'city_id'];


    public function city()
    {
        return $this->hasOne(City::class,'id','city_id');
    }


}
