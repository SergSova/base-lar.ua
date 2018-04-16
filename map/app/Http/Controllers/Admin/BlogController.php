<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Blog;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Blog::find(10);

        return view('admin.blog.index')->with(compact('model'));
    }

    public function pub(Request $request, $post)
    {

        /** @var Post $post */
        if ($post) {
            $post->published = !$post->published;
            if ($post->published) {
                $post->publishedOn = Carbon::now()->toDateTimeString();
                Session::flash('flash_message', 'Статья "'.strip_tags($post->mod_title)." ($post->id)".'" опубликованна');
            } else {
                $post->publishedOn = null;
                Session::flash('flash_message', 'Статья "'.strip_tags($post->mod_title)." ($post->id)".'" снята с публикации');
            }
            $post->save();
        }

        return redirect(route('blog.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $model ?? new Post();
        $title = 'Создание статьи';
        $route = 'blog.store';
        $method = 'post';

        return view('admin.blog.form.form_create')->with(compact('model', 'title', 'route', 'method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $model = new Post();
        $model->slug = str_slug($request->get('title_ru'));

        if ($model->fill($request->all()) && $model->save()) {
            $slider = array_filter($request->get('Photo'),function ($el){return $el['path']!='';});
            $model->slider = json_encode($slider);

            $model->saveSeo($request);
            if ($model->save()) {
                Session::flash('flash_message', 'Статья "'.strip_tags($model->mod_title)." ($model->id)".'" создана');

                return redirect(route('blog.index'));
            }
        }

        return redirect(route('blog.create'))->withInput($request->input());

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('blog.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /** @var Post $model */
        $model = Post::find($id);
        $title = 'Редактирование статьи "'.strip_tags($model->mod_title)." ($model->id)".'"';
        $route = 'blog.update';
        $method = 'PUT';

        return view('admin.blog.form.form_create')->with(compact('model', 'title', 'route', 'method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        /** @var Post $model */
        $model = Post::find($id);
        $model->slug = str_slug($request->get('title_ru'));
        if ($model->fill($request->all()) && $model->save()) {
            $slider = array_filter($request->get('Photo'),function ($el){return $el['path']!='';});
            $model->slider = json_encode($slider);
            $model->saveSeo($request);
            if ($model->save()) {
                Session::flash('flash_message', 'Статья "'.strip_tags($model->mod_title)." ($model->id)".'" обновлена');

                return redirect(route('blog.index'));
            }
        }

        return redirect(route('blog.edit', $id))->withInput($request->input());
    }

    /**
     * Пометить на удаление определенную статью.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /** @var Post $post */
        $post = Post::find($id);
        $post->published = false;
        $post->publishedOn = null;
        $post->save();
        Post::destroy($id);
        Session::flash('flash_message', 'Статья "'.strip_tags($post->mod_title)." ($post->id)".'" помечена на удаление');

        return redirect(route('blog.index'));
    }

    /**
     * Удалить совсем помеченые на удаление статьи если указан Id удаляеться указанная статья
     *
     * @param null $id Id статьи которую нужно удалить совсем
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function removeAll($id = null)
    {
        if ($id) {
            Session::flash('flash_message', 'Статья "'.$id.'" удалена');
            Post::onlyTrashed()->find($id)->forceDelete();
        } else {

            Post::onlyTrashed()->get()->each(
                function ($item) {
                    Session::flash('flash_message', 'Статья "'.$item->id.'" удалена');
                    $item->forceDelete();
                }
            );
        }

        return redirect(route('blog.index'));
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->find($id);
        $post->restore();
        Session::flash('flash_message', 'Статья "'.strip_tags($post->mod_title).'" востановлена');

        return redirect(route('blog.index'));
    }
}
