<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InstitutionAndSubCategory
 *
 * @package App\Models
 * @property int                    id
 * @property int                    institution_id
 * @property int                    institution_sub_cat_id
 * @property Institution            institution
 * @property InstitutionSubCategory sub_cat
 */
class InstitutionAndSubCategory extends Model
{
    protected $fillable = ['institution_id', 'institution_sub_cat_id'];

    public function institution()
    {
        return $this->hasOne(Institution::class, 'id', 'institution_id');
    }

    public function sub_cat()
    {
        return $this->hasMany(InstitutionSubCategory::class, 'id', 'sub_cat');
    }
}
