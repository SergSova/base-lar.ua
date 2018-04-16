<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = BlogCategory::all();

        return view('admin.blog.category.index')->with(compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new BlogCategory();
        $title = 'Создание Категории';
        $route = 'blog-category.store';
        $method = 'post';

        return view('admin.blog.category.form')->with(compact('model', 'title', 'route', 'method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new BlogCategory();
        $model->slug = str_slug($request->get('title_ru'));
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route('blog-category.index'));
        }

        return redirect(route('blog-category.create'))->withInput($request->input());

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
        return redirect(route('blog-category.index'));
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
        $model = BlogCategory::find($id);
        $title = 'Редактирование категории "'.$model->title.'"';
        $route = 'blog-category.update';
        $method = 'PUT';

        return view('admin.blog.category.form')->with(compact('model', 'title', 'route', 'method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /** @var Post $model */
        $model = BlogCategory::find($id);
        $model->slug = str_slug($request->get('title_ru'));
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route('blog-category.index'));
        }

        return redirect(route('blog-category.edit', $id))->withInput($request->input());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogCategory::destroy($id);
        Session::flash('flash_message', 'Категория "'.$id.'" удалена');

        return redirect()->back();
    }
}
