<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Criteria
 *
 * @package App\Models
 * @property int                    id
 * @property string                 name
 * @property int                    sub_cat_id
 * @property InstitutionSubCategory parent
 */
class Criteria extends Model
{
    protected $fillable = ['id', 'name', 'sub_cat_id'];

    public function parent()
    {
        return $this->hasOne(InstitutionSubCategory::class, 'id', 'sub_cat_id');
    }
}
