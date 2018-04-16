<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 03.04.2018
 * Time: 15:27
 */

namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\FaqAnswer;
use App\Models\Post;

class SearchController extends Controller
{

    public function search($search)
    {
        $lang = app()->getLocale();
        $match = "question_$lang, answer_$lang";
        $faqs = FaqAnswer::whereRaw("match ($match) AGAINST (\"$search*\" IN BOOLEAN MODE)")->get();
        $post_match = "title_$lang, content_$lang";
        $posts = Post::whereRaw("match ($post_match) AGAINST (\"$search*\" IN BOOLEAN MODE)")->where( 'published', 1 )->get();

//        dd($faqs, $posts);

        return view('search.result')->with(compact('posts','faqs'));
    }
}