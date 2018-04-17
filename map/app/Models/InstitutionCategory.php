<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InstitutionCategory
 *
 * @package App\Models
 * @property int                      id
 * @property string                   name
 * @property InstitutionSubCategory[] subcat
 */
class InstitutionCategory extends Model
{
    protected $fillable = ['name'];

    public function subcat()
    {
        return $this->hasMany(InstitutionSubCategory::class, 'parent_id', 'id');
    }
}
