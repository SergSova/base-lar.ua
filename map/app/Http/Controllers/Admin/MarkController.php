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
use App\Models\Mark;
use Illuminate\Http\Request;

class MarkController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Mark::paginate(15);
        $title = 'Метки для заведений';

        return view("admin.mark.index")->with(compact('models', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cat_id = null)
    {
        $model = new Mark();
        $model->cat_id = $cat_id;

        $all_category = InstitutionCategory::all()->flatMap(
            function ($el) {
                return [$el->name => $el->id];
            }
        )->flip();

        return view("admin.mark.form")->with(compact('model', 'all_category'));
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
        $model = new Mark();
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route("institution-categories.show", $model->parent_id));
        }

        return redirect(route("mark.create"))->withInput($request->input());
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
        return redirect(route("mark.index"));
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
        /** @var Mark $model */
        $model = Mark::find($id);
        $all_category = InstitutionCategory::all()->flatMap(
            function ($el) {
                return [$el->name => $el->id];
            }
        )->flip();

        return view("admin.mark.form")->with(compact('model', 'all_category'));
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
        $model = Mark::find($id);
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route("institution-categories.show", $model->parent_id));
        }

        return redirect(route("mark.create"))->withInput($request->input());
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
        Mark::destroy($id);

        return response('1',200);
    }

}