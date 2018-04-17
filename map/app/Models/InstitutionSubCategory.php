<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InstitutionSubCategory
 *
 * @package App\Models
 * @property int    id
 * @property string name
 * @property int    parent_id
 * @property InstitutionCategory    parent
 */
class InstitutionSubCategory extends Model
{
    protected $fillable = ['name', 'parent_id'];

    public function parent()
    {
        return $this->hasOne(InstitutionCategory::class, 'id', 'parent_id');
    }
}
