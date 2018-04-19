<?php

namespace App;

use App\Models\Institution;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InstGallery
 *
 * @package App
 * @property int         id
 * @property int         inst_id
 * @property int         index
 * @property string      path
 * @property string      desc
 * @property string      title
 * @property string      alt
 * @property Institution parent
 */
class InstGallery extends Model
{
    protected $fillable
        = [
            'inst_id',
            'index',
            'path',
            'desc',
            'title',
            'alt',
        ];

    public function parent()
    {
        return $this->hasOne(Institution::class, 'id', 'inst_id');
    }
}
