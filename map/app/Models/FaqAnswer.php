<?php

namespace App\Models;

use App\Http\Middleware\Locale;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FaqAnswer
 *
 * @package App
 * @property string question_ru
 * @property string question_uk
 * @property string answer_ru
 * @property string answer_uk
 * @property int    index
 */
class FaqAnswer extends Model
{
    protected $fillable
        = [
            'question_ru',
            'question_uk',
            'answer_ru',
            'answer_uk',
            'index',
        ];

    public function getQuestionAttribute($key)
    {
        return $this->{'question_'.app()->getLocale()}??'('.$this->{'question_'.Locale::$mainLanguage}.')*';
    }

    public function getAnswerAttribute($key)
    {
        return $this->{'answer_'.app()->getLocale()}??'('.$this->{'answer_'.Locale::$mainLanguage}.')*';
    }
}
