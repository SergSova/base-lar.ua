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
use App\Models\Criteria;
use App\Models\InstitutionSubCategory;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Criteria::paginate(15);
        $title = 'Критерии оценки заведений';

        return view("admin.criteria.index")->with(compact('models', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sub_cat_id = null)
    {
        $model = new Criteria();
        $model->sub_cat_id = $sub_cat_id;

        $all_sub_category = InstitutionSubCategory::all()->flatMap(
            function ($el) {
                return [$el->name => $el->id];
            }
        )->flip();

        return view("admin.criteria.form")->with(compact('model', 'all_sub_category'));
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
        $model = new Criteria();
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route("institution-sub-categories.show", $model->sub_cat_id));
        }

        return redirect(route("criteria.create"))->withInput($request->input());
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
        return redirect(route("criteria.index"));
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
        /** @var Criteria $model */
        $model = Criteria::find($id);
        $all_sub_category = InstitutionSubCategory::all()->flatMap(
            function ($el) {
                return [$el->name => $el->id];
            }
        )->flip();

        return view("admin.criteria.form")->with(compact('model', 'all_sub_category'));
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
        $model = Criteria::find($id);
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route("institution-sub-categories.show", $model->sub_cat_id));
        }

        return redirect(route("criteria.create"))->withInput($request->input());
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
        Criteria::destroy($id);

        return response('1',200);
    }

}