<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\District;
use App\Models\Metro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MetroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Metro::paginate(15);
        $title = 'Метро';

        return view('admin.metro.index')->with(compact('models', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Metro();
        $all_countries = Country::all()->flatMap(
            function ($el) {
                return [$el->name => $el->id];
            }
        )->flip();

        return view('admin.metro.form')->with(compact('model', 'all_countries'));
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
        $model = new Metro();
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route('metro.index'));
        }

        return redirect(route('metro.create'))->withInput($request->input());
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
        return redirect(route('metro.index'));
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
        $model = Metro::find($id);
        $all_countries = Country::all()->flatMap(
            function ($el) {
                return [$el->name => $el->id];
            }
        )->flip();
        $city_arr = [$model->city_id => $model->city->name];

        return view('admin.metro.form')->with(compact('model', 'all_countries', 'city_arr'));
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
        $model = Metro::find($id);
        if ($model->fill($request->all()) && $model->save()) {
            return redirect(route('metro.index'));
        }

        return redirect(route('metro.create'))->withInput($request->input());
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function destroy($id)
    {
        if (Metro::destroy($id)) {
            return response('1', 200);
        } else {
            return response('0', 405);
        }
    }

    public function metroByCity($city_id)
    {
        return Metro::where('city_id', $city_id)->get()->flatMap(
            function ($el) {
                return [$el->name => $el->id];
            }
        )->flip()->toJson();
    }
}
