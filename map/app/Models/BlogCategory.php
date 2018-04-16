<?php

namespace App\Models;

use App\Http\Middleware\Locale;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BlogCategory
 *
 * @package App
 * @property int     id
 * @property string  title_ru
 * @property string  title_uk
 * @property string  icon
 * @property string  slug
 * @property boolean isMain
 */
class BlogCategory extends Model
{
    protected $fillable = ['title_ru', 'title_uk', 'icon', 'isMain'];

    protected $casts
        = [
            'isMain' => 'boolean',
        ];

    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()} ?? $this->{'title_'.Locale::$mainLanguage}.'*';
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

}
