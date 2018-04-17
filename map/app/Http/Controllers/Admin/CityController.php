<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = City::paginate(15);
        $title = 'Города';

        return view('admin.city.index')->with(compact('models', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new City();
        $all_countries = Country::all()->flatMap(
            function ($el) {
                return [$el->name => $el->id];
            }
        )->flip();

        return view('admin.city.form')->with(compact('model', 'all_countries'));
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
        $model = new City();
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route('city.index'));
        }

        return redirect(route('city.create'))->withInput($request->input());
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
        return redirect(route('city.index'));
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
        $model = City::find($id);
        $all_countries = Country::all()->flatMap(
            function ($el) {
                return [$el->name => $el->id];
            }
        )->flip();

        return view('admin.city.form')->with(compact('model', 'all_countries'));
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
        $model = City::find($id);
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route('city.index'));
        }

        return redirect(route('city.create'))->withInput($request->input());
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
        City::destroy($id);

        return 1;
    }

    public function cityByCountry($country_id)
    {
        return $all_countries = City::where('country_id', $country_id)->get()->flatMap(
            function ($el) {
                return [$el->name => $el->id];
            }
        )->flip()->toJson();
    }
}
