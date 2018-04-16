<?php

namespace App\Models;

/**
 * Class Blog
 *
 * @package App
 * @property string  title
 * @property string  longtitle
 * @property string  description
 * @property int     page_index
 * @property string  menutitle
 * @property boolean published
 * @property string  alias
 * @property int     seo_id
 * @property Seo     getSeo
 */
class Blog extends StaticPage
{


    protected $table = 'static_pages';

    /**
     * @return Post[]
     */
    public function posts()
    {
        return Post::orderBy('publishedOn', 'desc')->withTrashed()->get();
    }

    protected $fillable = [
        'title_ru',
        'longtitle_ru',
        'description_ru',
        'menutitle'];

    public function seoru()
    {
        return $this->hasOne(Seo::class, 'id', 'seo_id_ru');
    }

    public function seouk()
    {
        return $this->hasOne(Seo::class, 'id', 'seo_id_uk');
    }

}
