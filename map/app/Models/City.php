<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 *
 * @package App\Models
 * @property int     id
 * @property string  name
 * @property int     country_id
 * @property Country country
 */
class City extends Model
{
    protected $fillable = ['name', 'country_id'];

    public function country()
    {
        return $this->hasOne(Country::class);
    }
}
