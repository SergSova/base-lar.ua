<?php

namespace App\Models;

use App\Http\Middleware\Locale;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StaticPage
 *
 * @package App
 * @property string      title_ru
 * @property string      title_uk
 * @property string      longtitle_ru
 * @property string      longtitle_uk
 * @property string      description_ru
 * @property string      description_uk
 * @property int         page_index
 * @property string      menutitle
 * @property boolean     published
 * @property string      alias
 * @property int         seo_id_ru
 * @property int         seo_id_uk
 * @property Seo         seo
 * @property FaqAnswer[] questions
 */
class StaticPage extends Model
{
    protected $fillable
        = [
            'title_ru',
            'longtitle_ru',
            'description_ru',
            'title_uk',
            'longtitle_uk',
            'description_uk',
            'menutitle',
        ];


    public function saveSeo($request)
    {
        if ($Request_seo = $request->get('Seo')) {
            foreach ($Request_seo as $lang => $seoReq) {
                if (!$seo = $this->{'seo'.$lang}) {
                    $seo = new Seo();
                }
                $seo->fill($seoReq)->save();
                $this->{'seo_id'.($lang ? '_'.$lang : '')} = $seo->id;
            }
            $this->save();
        }
    }


    public function getQuestions()
    {
        return FaqAnswer::orderBy('index')->get();
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

    public function getNext()
    {
        $lang = app()->getLocale();
        $obj = [
            'title' => ' ',
            'alias' => '',
        ];
        $mod = self::where(['page_index' => $this->page_index + 1])->first();
        if ($mod) {
            $mod->alias = $mod->alias == 'index' ? '/' : '/'.$mod->alias;
            $obj['title'] = $this->clearTitle($mod);
            $obj['alias'] = $lang == 'uk' ? "/".$lang.$mod->alias : $mod->alias;
        }

        return $obj;
    }

    public function getPrev()
    {
        $lang = app()->getLocale();
        $obj = [
            'title' => ' ',
            'alias' => '',
        ];

        $model = self::where(['page_index' => $this->page_index - 1])->first();
        if ($model) {
            $model->alias = $model->alias == 'index' ? '/' : '/'.$model->alias;
            $obj['title'] = $this->clearTitle($model);
            $obj['alias'] = $lang == 'uk' ? "/".$lang.$model->alias : $model->alias;
        }

        return $obj;
    }

    public function clearTitle($model = null)
    {
        if (is_null($model)) {
            $model = $this;
        }

        return $this->my_mb_ucfirst(preg_replace('/[\/-:]/', '', strip_tags($model->title)));
    }

    protected function my_mb_ucfirst($str)
    {
        $fc = mb_strtoupper(mb_substr($str, 0, 1));

        return $fc.mb_substr($str, 1);
    }

    public function getSeoTitleAttribute()
    {
        return $this->{'seo'.app()->getLocale()}->seo_title ?? $this->clearTitle($this).' | '.config('app.name');
    }

    public function saveCustomField($request, $name)
    {
        switch ($name) {
            case 'faq':
                foreach ($request->only('Question') as $question) {
                    foreach ($question as $q_el) {
                        if (!empty($q_el['id'])) {
                            /** @var FaqAnswer $answer */
                            $answer = FaqAnswer::find($q_el['id']);
                            $answer->fill($q_el);
                        } else {
                            $answer = new FaqAnswer($q_el);
                        }
                        $answer->save();
                    }
                }
                break;
            case 'aids':
                $filds = collect(['modal_text', 'modal_btn', 'modal_bottom']);

                foreach (Locale::$languages as $language) {
                    $isMain = Locale::$mainLanguage == $language;
                    $this->{'description_'.$language} = json_encode(
                        $filds->flatMap(
                            function ($el) use ($language, $isMain) {
                                return [$el.'_'.$language => $_POST[$el.'_'.$language]];
                            }
                        ),
                        JSON_UNESCAPED_UNICODE
                    );
                }
                break;
            case 'slide-bubles':
                $filds = collect(
                    [
                        'modal_text',
                        'modal_btn',
                        'wrong',
                    ]
                );
                break;
            case 'slide-rocket':
                $filds = collect(
                    [
                        'modal_text',
                        'modal_btn',
                        'text_bottom',
                        'wrong',
                    ]
                );
                break;
            case 'with-who':
                $filds = collect(
                    [
                        'modal_text',
                        'modal_btn',
                        'pop_title',
                        'chk_1',
                        'chk_2',
                        'chk_3',
                        'chk_4',
                        'chk_5',
                        'chk_6',
                        'Humans',
                    ]
                );
                break;
            case 'bandit':
                $filds = collect(
                    [
                        'modal_text',
                        'modal_btn',
                        'tumb_on_off',
                        'rocket_btn',
                        'rotator1',
                        'rotator2',
                        'rotator3',
                        'rotator4',
                    ]
                );
                break;
            case 'condoms-white':
                $filds = collect(['Tabs']);
                break;
            case 'consultants':
                $filds = collect(
                    [
                        'description',
                        'Consultant',
                        'consHeader_1',
                        'consHeader_2',
                        'consHeader_3',
                        'consHeader_4',
                        'consHeader_5',
                        'consHeader_6',
                        'consHeader_7',
                        'list',
                    ]
                );
                break;
            case 'aids-test':
                $filds = collect(['short_description','description', 'test_btn', 'test_btn_next', 'test_btn_refresh', 'Quest', 'Answer',]);
                break;
            case 'about':
                $slider = $_POST['Photo'];
                $filds = collect(['desc_title', 'supported', 'description']);
                $this->longtitle_ru = json_encode(['slider' => collect($slider)], JSON_UNESCAPED_UNICODE);
                $this->longtitle_uk = json_encode(['slider' => collect($slider)], JSON_UNESCAPED_UNICODE);
                break;
            case 'map':
                $filds = collect(['City']);
                break;
        }
        if (isset($filds)) {
            foreach (Locale::$languages as $language) {
                $isMain = Locale::$mainLanguage == $language;
                $this->{'description_'.$language} = json_encode(
                    $filds->flatMap(
                        function ($el) use ($language, $isMain) {
                            return [$el.'_'.$language => $_POST[$el.'_'.$language]];
                        }
                    ),
                    JSON_UNESCAPED_UNICODE
                );
            }
        }
        $this->save();

    }

    public function loadCustomField($name)
    {
        $this->merge(json_decode($this->description_uk));
        $this->merge(json_decode($this->description_ru));
        $lang = app()->getLocale();
        switch ($name) {
            case 'aids':
                break;
            case 'slide-bubles':
                break;
            case'slide-rocket':
                break;
            case 'with-who':
                $this->Humans_ru = $this->Humans_ru ?? collect();
                $this->Humans_uk = $this->Humans_uk ?? collect();
                break;
            case 'condoms-white':
                break;
            case 'consultants':
                $this->Consultant_ru = $model->Consultant_ru ?? collect();
                $this->Consultant_uk = $model->Consultant_uk ?? collect();
                break;
            case 'about':
                $this->merge(json_decode($this->longtitle_uk));
                $this->merge(json_decode($this->longtitle_ru));
                break;
            case 'aids-test':
                $this->Quest_ru = $this->Quest_ru ?? collect();
                $this->Answer_ru = $this->Answer_ru ?? collect();
                $this->Quest_uk = $this->Quest_uk ?? collect();
                $this->Answer_uk = $this->Answer_uk ?? collect();
                break;
            case 'map':
                $this->City_ru = $this->City_ru ?? collect();
                $this->City_uk = $this->City_uk ?? collect();
                break;
        }
    }

    public function merge($obj)
    {
        if (!is_null($obj)) {
            foreach ($obj as $key => $val) {
                $this->$key = $val;
            }
        }

        return $this;
    }

    public function getTitleAttribute($key)
    {
        return $this->{'title_'.app()->getLocale()};
    }

    public function getLongtitleAttribute($key)
    {
        return $this->{'longtitle_'.app()->getLocale()};
    }

    public function getDescriptionAttribute($key)
    {
        return $this->{'description_'.app()->getLocale()};
    }

    public function getAdressAttribute($key)
    {
        return $this->{'City_'.app()->getLocale()}
            ? json_encode(
                collect($this->{'City_'.app()->getLocale()})
                    ->flatMap(
                        function ($el) {
                            return $el->centers;
                        }
                    )
                    ->map(
                        function ($el) {
                            $el->info = str_replace(array("\r\n", "\r", "\n"), "<br />", $el->info);
                            return $el;
                        }
                    )
                    ->filter(
                        function ($el) {
                            return $el->title != '';
                        }
                    ),
                JSON_UNESCAPED_UNICODE
            )
            :
            '""';
    }

    public function getTownsAttribute($key)
    {
        return $this->{'City_'.app()->getLocale()} ? json_encode(
            collect($this->{'City_'.app()->getLocale()})->map(
                function ($el) {
                    unset($el->centers);
                    return $el;
                }
            )->filter(
                function ($el) {
                    return $el->title != '';
                }
            ),
            JSON_UNESCAPED_UNICODE
        ) : '""';
    }
}
