<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\StaticPage;

/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 14.03.2018
 * Time: 11:30
 */
class SiteController extends Controller
{
    protected $prefix = 'site.';


    public function index()
    {
        /** @var StaticPage $model */
        $model = StaticPage::find(1);
        $model->title_mod = preg_replace('/(\w+)\s(\w+)/u', '$1 <div> $2 </div>', $model->title);
        $model->longtitle_mod = '<span>'.join('</span><span>', explode('/', $model->longtitle)).'</span>';

        return view($this->prefix.'index')->with(compact('model'));
    }

    public function aids()
    {
        /** @var StaticPage $model */
        $model = StaticPage::find(2);
        $next = $model->getNext();
        $prev = $model->getPrev();

        $modal = json_decode($model->description);
        $model->merge($modal);


        $lang = app()->getLocale();
        $model->title_mod = join('<br>', explode('/', $model->title));

        $model->{'modal_text_'.$lang} = '<p>'.join('</p><p>', explode('/', $modal->{'modal_text_'.$lang})).'</p>';
        $model->{'modal_bottom_'.$lang} = '<p>'.join('<br>', explode('/', $modal->{'modal_bottom_'.$lang})).'</p>';

        return view($this->prefix.'aids')->with(compact('model', 'next', 'prev'));
    }

    public function slideBubles()
    {
        $model = StaticPage::find(3);
        $next = $model->getNext();
        $prev = $model->getPrev();

        $modal = json_decode($model->description);
        $model->merge($modal);

        return view($this->prefix.'slide-bubles')->with(compact('model', 'next', 'prev'));
    }

    public function slideRocket()
    {
        $model = StaticPage::find(4);
        $next = $model->getNext();
        $prev = $model->getPrev();

        $model->title_mod = join('<br>', explode('/', $model->title));
        $model->merge(json_decode($model->description));
        $lang = app()->getLocale();

        $model->{'modal_text_'.$lang} = '<p>'.join('</p><p>', explode('/', $model->{'modal_text_'.$lang})).'</p>';
        $model->{'text_bottom_'.$lang} = explode('/', $model->{'text_bottom_'.$lang});
        $model->{'wrong_'.$lang} = join('<br>', explode('/', $model->{'wrong_'.$lang}));

        return view($this->prefix.'slide-rocket')->with(compact('model', 'next', 'prev'));
    }

    public function withWho()
    {
        /** @var StaticPage $model */
        $model = StaticPage::find(5);
        $next = $model->getNext();
        $prev = $model->getPrev();

        $model->title_mod = join('<br>', explode('/', $model->title));
        $model->merge(json_decode($model->description));
        $model->{'modal_text_'.app()->getLocale()} = '<p>'.join('</p><p>', explode('/', $model->{'modal_text_'.app()->getLocale()})).'</p>';
        $model->{'pop_title_'.app()->getLocale()} = preg_replace('/^([\w\s]+)\*\s?(\w+)\s?\*(.*)$/u', '$1<span>$2</span>$3', $model->{'pop_title_'.app()->getLocale()});

        return view($this->prefix.'with-who')->with(compact('model', 'next', 'prev'));
    }

    public function bandit()
    {
        $model = StaticPage::find(6);
        $next = $model->getNext();
        $prev = $model->getPrev();

        $modal = json_decode($model->description);
        /** @var StaticPage $model */
        $model->merge($modal);

        $lang = app()->getLocale();
        $model->{'tumb_on_off_'.$lang} = explode('/', $model->{'tumb_on_off_'.$lang});
        $model->{'modal_text_'.$lang} = '<p>'.join('</p><p>', explode('/', $model->{'modal_text_'.$lang})).'</p>';
        $model->{'rotator4_'.$lang} = join('<br>', explode('/', $model->{'rotator4_'.$lang}));

        $model->title_mod = join('<br>', explode('/', $model->title));

        return view($this->prefix.'bandit')->with(compact('model', 'next', 'prev'));
    }

    public function condomsWhite()
    {
        $model = StaticPage::find(7);

        $modal = json_decode($model->description);
        /** @var StaticPage $model */
        $model->merge($modal);

        return view($this->prefix.'condoms-white')->with(compact('model', 'next', 'prev'));
    }

    public function consultants()
    {
        $model = StaticPage::find(8);
        $modal = json_decode($model->description);
        /** @var StaticPage $model */
        $model->merge($modal);

        return view($this->prefix.'consultants')->with(compact('model', 'next', 'prev'));
    }

    public function testPage()
    {
        $model = StaticPage::find(9);
        $modal = json_decode($model->description);
        /** @var StaticPage $model */
        $model->merge($modal);

        return view($this->prefix.'test-page')->with(compact('model'));
    }

    public function faq($index=null)
    {
        $model = StaticPage::find(11);

        return view($this->prefix.'faq')->with(compact('model', 'index'));
    }

    public function map()
    {
        $model = StaticPage::find(12);
        $modal = json_decode($model->description);
        /** @var StaticPage $model */
        $model->merge($modal);

        return view($this->prefix.'map')->with(compact('model'));
    }

    public function about()
    {
        $model = StaticPage::find(13);
        /** @var StaticPage $model */
        $model->merge(json_decode($model->description));
        $model->merge(json_decode($model->longtitle));

        return view($this->prefix.'about')->with(compact('model'));
    }

    public function search($search)
    {
        $lang = app()->getLocale();
        $static = StaticPage::where('title_'.$lang);
    }
}