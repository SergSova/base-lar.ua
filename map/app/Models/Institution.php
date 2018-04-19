<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Institution
 *
 * @package App\Models
 * @property int                 id
 * @property string              name          Заголовок
 * @property string              address       Адрес заведения
 * @property string              avg_cost      Средний чек
 * @property int                 cuisine       Кухня
 * @property array               phones        Телефоны JSON
 * @property string              email
 * @property string              web           Ссылка на сайт
 * @property array               socials       JSON массив (название=>ссылка)
 * @property string              content       Текст описания
 * @property boolean             isCounsel     Рекомендовать
 * @property boolean             isEveryDay    Ежедневный график
 * @property array               schedule      расписание на неделю или на один день(если график ежедневный)
 * @property string              status        Enum(disable, active)
 * @property string              request       Enum(request, rejected, approved)
 * @property string              date_request  Дата запроса
 * @property string              date_approved Дата одобрения
 *
 * @property int                 district_id   Ссылка на таблицу районов
 * @property District            district      Район
 * @property int                 metro_id      Ссылка на таблицу метро
 * @property Metro               metro         Метро
 * @property int                 category_id   Ссылка на таблицу категорий
 * @property InstitutionCategory category      Категория
 * @property int                 author_id
 * @property User                author        Автор
 *
 */
class Institution extends Model
{
    protected $fillable
        = [
            'name',
            'district_id',
            'address',
            'metro_id',
            'avg_cost',
            'cuisine',
            'phones',
            'email',
            'web',
            'socials',
            'content',
            'category_id',
            'isCounsel',
            'isEveryDay',
            'schedule',
            'status',
            'request',
        ];
    protected $dates
        = [
            'date_request',
            'date_approved',
        ];

    protected $casts
        = [
            'isCounsel'  => 'boolean',
            'isEveryDay' => 'boolean',
            'phones'     => 'array',
            'socials'    => 'array',
            'schedule'   => 'array',
        ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function category()
    {
        return $this->hasOne(InstitutionCategory::class, 'id', 'category_id');
    }

    public function metro()
    {
        return $this->hasOne(Metro::class, 'id', 'metro_id');
    }

    public function district()
    {
        return $this->hasOne(District::class, 'id', 'district_id');
    }


}
