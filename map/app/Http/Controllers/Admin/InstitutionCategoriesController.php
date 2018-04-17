<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 17.04.2018
 * Time: 12:18
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\InstitutionCategory;
use App\Models\InstitutionSubCategory;
use App\Models\Mark;
use Illuminate\Http\Request;

class InstitutionCategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = InstitutionCategory::paginate(15);
        $title = 'Категории заведений';

        return view("admin.institution-categories.index")->with(compact('models', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new InstitutionCategory();

        return view("admin.institution-categories.form")->with(compact('model'));
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
        $model = new InstitutionCategory();
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route("institution-categories.show", $model->id));
        }

        return redirect(route("institution-categories.create"))->withInput($request->input());
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
        $title = InstitutionCategory::find($id)->name;
        $parent_id = $id;
        $models = InstitutionSubCategory::where('parent_id', $id)->paginate(15);
        $marks = Mark::where('cat_id', $id)->paginate(15);

        return view('admin.institution-categories.show')->with(compact('models', 'marks', 'title', 'parent_id'));
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
        /** @var InstitutionCategory $model */
        $model = InstitutionCategory::find($id);

        return view("admin.institution-categories.form")->with(compact('model'));
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
        $model = InstitutionCategory::find($id);
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route("institution-categories.show", $model->id));
        }

        return redirect(route("institution-categories.create"))->withInput($request->input());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return int
     */
    public function destroy($id)
    {
        InstitutionCategory::destroy($id);

        return true;
    }

}