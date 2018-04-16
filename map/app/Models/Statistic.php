<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Statistic
 *
 * @package App
 *
 * @property integer id
 * @property string  q1
 * @property string  q2
 * @property string  q3
 * @property string  q4
 * @property string  q5
 * @property string  q6
 * @property string  q7
 * @property string  q8
 * @property string  q9
 * @property string  q10
 * @property string  q11
 * @property string  q12
 *
 */
class Statistic extends Model
{
    protected $fillable
        = [
            'q1',
            'q2',
            'q3',
            'q4',
            'q5',
            'q6',
            'q7',
            'q8',
            'q9',
            'q10',
            'q11',
            'q12',
        ];

    /*public function getAnswerAttribute($key)
    {
        return collect(json_decode($key))->map(
            function ($el) {
                return [$el->label => $el->answer];
            }
        );
    }*/

    protected $casts
        = [
            'q1'  => 'array',
            'q2'  => 'array',
            'q3'  => 'array',
            'q4'  => 'array',
            'q5'  => 'array',
            'q6'  => 'array',
            'q7'  => 'array',
            'q8'  => 'array',
            'q9'  => 'array',
            'q10' => 'array',
            'q11' => 'array',
            'q12' => 'array',
        ];

    public function getStatisticAttribute()
    {
        $model = StaticPage::find(9);
        $model->merge(json_decode($model->description));
        $question = $model->Quest_ru;
        $models = $this->all();
        $answers = collect();
        for ($i = 1; $i <= 12; $i++) {
            $quest = collect($question)->get($i - 1);
            $answers[$quest->label] = [
                'multi'  => $quest->multi ?? false,
                'models' => $models->sortBy('q'.$i)->groupBy('q'.$i),
            ];
        }
        return $answers;
    }

    public function getCountAttribute($key)
    {
        return self::all()->count();
    }
}
