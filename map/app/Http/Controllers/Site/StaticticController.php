<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 12.04.2018
 * Time: 11:15
 */

namespace App\Http\Controllers\Site;


use App\Models\Statistic;
use Illuminate\Http\Request;

class StaticticController
{

    public function view()
    {
        $model = new Statistic();
        if (!$model->count()) {
            return redirect()->back();
        }

        return view('admin.statistic.index')->with(compact('model'));
    }

    public function save(Request $request)
    {
        $answers = $request->all();
        $statistic = new Statistic();
        foreach ($answers as $answer) {
            $statistic->{'q'.($answer['index'] + 1)} = $answer['answer'];
        }
//        dd($statistic);
        if ($statistic->save()) {
            $body = '';
            $headers = "From: ".'hello@drugstore.org.ua'."\r\n";
            $headers .= "Reply-To: ".'hello@drugstore.org.ua'."\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html;charset=utf-8 \r\n";

            $arr = $request->all();
            $subject = 'результаты теста';
            $body = view('admin.statistic.mail-template')->with(compact('arr', 'subject'))->render();
            if (mail('Musevich@gmail.com,sergsova25@gmail.com', $subject, $body, $headers)) {
                return 'ok';
            } else {
                return 'ne ok';
            }
        }

        return '';
    }
}