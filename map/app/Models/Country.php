<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 *
 * @package App\Models
 *
 * @property int    id
 * @property string name
 */
class Country extends Model
{
    protected $fillable = ['name'];
}
