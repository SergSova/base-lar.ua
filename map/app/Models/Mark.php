<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mark
 *
 * @package App\Models
 * @property int                 id
 * @property string              name
 * @property string              icon
 * @property int                 cat_id
 * @property InstitutionCategory parent
 */
class Mark extends Model
{
    protected $fillable
        = [
            'name',
            'icon',
            'cat_id',
        ];

    public function parent()
    {
        return $this->hasOne(InstitutionCategory::class, 'id', 'cat_id');
    }

}
