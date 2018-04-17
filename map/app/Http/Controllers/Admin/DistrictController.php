<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = District::paginate(15);
        $title = 'Районы';

        return view('admin.dist.index')->with(compact('models', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new District();
        $all_countries = Country::all()->flatMap(
            function ($el) {
                return [$el->name => $el->id];
            }
        )->flip();

        return view('admin.dist.form')->with(compact('model', 'all_countries'));
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
        $model = new District();
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route('dist.index'));
        }

        return redirect(route('dist.create'))->withInput($request->input());
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
        return redirect(route('dist.index'));
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
        /** @var District $model */
        $model = District::find($id);
        $all_countries = Country::all()->flatMap(
            function ($el) {
                return [$el->name => $el->id];
            }
        )->flip();
        $city_arr = [$model->city_id => $model->city->name];

        return view('admin.dist.form')->with(compact('model', 'all_countries', 'city_arr'));
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
        $model = District::find($id);
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route('dist.index'));
        }

        return redirect(route('dist.create'))->withInput($request->input());
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
        District::destroy($id);

        return true;
    }
}
