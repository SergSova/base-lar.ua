<?php
/**
 * Created by PhpStorm.
 * User: sergs
 * Date: 20.03.2018
 * Time: 15:51
 */

namespace App\Models;

use App\Http\Middleware\Locale;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Lang;

/**
 * Class Post
 *
 * @package App
 * @property int     $id
 * @property string  $title_ru
 * @property string  $content_ru
 * @property string  $description_ru
 * @property string  $title_uk
 * @property string  $content_uk
 * @property string  $description_uk
 * @property bool    $published
 * @property string  $publishedOn
 * @property string  $mainImage
 * @property string  $mainVideo
 * @property boolean $isVideo
 * @property boolean $isBlackTitle
 * @property boolean $isVioletPostStyle
 * @property boolean $isBig
 * @property string  $slider
 * @property int     $viewers
 * @property int     $followers
 * @property string  $author
 * @property string  $authorImage
 * @property int     $index
 * @property string  $slug
 * @property int     $category_id
 * @property int     $seo_id_ru
 * @property int     $seo_id_uk
 * @property Carbon  $deleted_at
 */
class Post extends Model
{
    use SoftDeletes;

    protected $casts
        = [
            'published'         => 'boolean',
            'isVideo'           => 'boolean',
            'isBlackTitle'      => 'boolean',
            'isVioletPostStyle' => 'boolean',
            'isBig'             => 'boolean',
        ];

    protected $fillable
        = [
            'title_ru',
            'mainImage',
            'isBlackTitle',
            'isVioletPostStyle',
            'isBig',
            'isVideo',
            'mainVideo',
            'content_ru',
            'description_ru',
            'author',
            'category_id',
            'authorImage',
            'published',
            'publishedOn',
            'title_uk',
            'content_uk',
            'description_uk',
        ];

    protected $dates = ['deleted_at'];

    public function getModTitleAttribute()
    {
        $locale = \app()->getLocale();
        $title = $this->{'title_'.$locale} ?? $this->{'title_'.Locale::$mainLanguage}.'*';

        return strstr($title, '~') ? '<span>'.implode('</span> <span>', explode('~', $title)).'</span>' : $title;
    }

    public function getContentAttribute($key)
    {
        return $this->{'content_'.\app()->getLocale()};
    }

    public function getTitleAttribute($key)
    {
        return $this->{'title_'.\app()->getLocale()};
    }

    public function getDescriptionAttribute($key)
    {
        return $this->{'description_'.\app()->getLocale()};
    }

    public function getSeoAttribute($key)
    {
        return $this->{'seo'.app()->getLocale()};
    }

    public function seoru()
    {
        return $this->hasOne(Seo::class, 'id', 'seo_id_ru');
    }

    public function seouk()
    {
        return $this->hasOne(Seo::class, 'id', 'seo_id_uk');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(BlogCategory::class, 'id', 'category_id');
    }

    public function saveSeo($request)
    {
        if ($Request_seo = $request->get('Seo')) {
            foreach ($Request_seo as $lang => $seoReq) {
                if (!$seo = $this->{'seo'.$lang}) {
                    $seo = new Seo();
                }
                if ($seoReq) {
                    $seo->fill($seoReq)->save();
                    $this->{'seo_id'.($lang ? '_'.$lang : '')} = $seo->id;
                }
            }
            $this->save();

        }
    }

    public function getSliderAttribute($value)
    {
        return collect($value ? json_decode($value) : []);
    }

    public function getUrlAttribute()
    {
        return route('blogArticle', [$this->category->slug, $this->slug]);
    }

    public function getFormatDataAttribute()
    {
        /** @var Carbon $data */
        $data = $this->publishedOn;
        if (is_null($data)) {
            return '-';
        }

        $date = Carbon::parse($data);

        return $date->diffInHours(Carbon::now()) == 0
            ? $date->diffForHumans()
            :
            $date->format('d').' '.Lang::get('month.m'.$date->month).' '.$date->format('Y H:i')/*.' '.$date->hour.':'.$date->minute*/
            ;
    }

    public function getFullDataAttribute()
    {
        $date = Carbon::parse($this->publishedOn);

        return $date->day
            .' '
            .Lang::get('month.m'.$date->month)
            .' '
            .$date->year
            .' '
            .Lang::get('site.year');
    }

    public function getAllCategoryAttribute()
    {
        return BlogCategory::all()->flatMap(
            function ($el) {
                return [$el->title => $el->id];
            }
        )->flip();
    }
}