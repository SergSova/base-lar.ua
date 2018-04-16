<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StaticPageRequest;
use App\Http\Controllers\Controller;
use App\Models\StaticPage;

class StaticPageController extends Controller
{
    protected $prefix = 'admin.static.';

    public function index()
    {
        $models = StaticPage::orderBy('page_index')->get();
        $title = 'Статические страницы';

        return view($this->prefix.'index')->with(compact('models', 'title'));
    }

    /**
     * @param StaticPageRequest $request
     * @param  StaticPage       $model
     * @param                   $name
     *
     * @return $this
     */
    public function edit(StaticPageRequest $request, $model, $name)
    {

        if ($request->isMethod('post') && $model->fill($request->all())->save()) {

            $model->saveCustomField($request,$name);
            $model->saveSeo($request);

            return redirect()->route('staticPage');
        }

        $model->loadCustomField($name);

        $title = 'Редактирование '.ucfirst($name);

        $form = $this->prefix.'form.'.strtolower($name);

        return view('admin.static.form_layout')->with(compact('model', 'title', 'form'));
    }
}
