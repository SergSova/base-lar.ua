<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InstitutionSubCategory
 *
 * @package App\Models
 * @property int                 id
 * @property string              name
 * @property int                 parent_id
 * @property InstitutionCategory parent
 * @property Criteria[]          criteries
 */
class InstitutionSubCategory extends Model
{
    protected $fillable = ['name', 'parent_id'];

    public function parent()
    {
        return $this->hasOne(InstitutionCategory::class, 'id', 'parent_id');
    }

    public function criteries()
    {
        return $this->hasMany(Criteria::class, 'sub_cat_id', 'id');
    }
}
