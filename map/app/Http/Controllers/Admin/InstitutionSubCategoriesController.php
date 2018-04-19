<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 17.04.2018
 * Time: 12:18
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\InstitutionCategory;
use App\Models\InstitutionSubCategory;
use Illuminate\Http\Request;

class InstitutionSubCategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = InstitutionSubCategory::paginate(15);
        $title = 'Подкатегории заведений';

        return view("admin.institution-sub-categories.index")->with(compact('models', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($parent_id = null)
    {
        $model = new InstitutionSubCategory();
        $model->parent_id = $parent_id;

        $all_category = InstitutionCategory::all()->flatMap(
            function ($el) {
                return [$el->name => $el->id];
            }
        )->flip();

        return view("admin.institution-sub-categories.form")->with(compact('model', 'all_category'));
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
        $model = new InstitutionSubCategory();
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route("institution-categories.show", $model->parent_id));
        }

        return redirect(route("institution-sub-categories.create"))->withInput($request->input());
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
        $model = InstitutionSubCategory::find($id);
        $title = $model->name;
        $parent_id = $id;
        $models = $model->criteries()->paginate(15);

        return view('admin.institution-sub-categories.show')->with(compact('models', 'title', 'parent_id'));
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
        /** @var InstitutionSubCategory $model */
        $model = InstitutionSubCategory::find($id);
        $all_category = InstitutionCategory::all()->flatMap(
            function ($el) {
                return [$el->name => $el->id];
            }
        )->flip();

        return view("admin.institution-sub-categories.form")->with(compact('model', 'all_category'));
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
        $model = InstitutionSubCategory::find($id);
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route("institution-categories.show", $model->parent_id));
        }

        return redirect(route("institution-sub-categories.create"))->withInput($request->input());
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
        InstitutionSubCategory::destroy($id);

        return response('1',200);
    }

}