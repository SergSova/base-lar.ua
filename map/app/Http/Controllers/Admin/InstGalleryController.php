<?php

namespace App\Http\Controllers\Admin;

use App\InstGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param null $id
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $gallery = InstGallery::where('inst_id', $id)->pagitane(5);

        return view('admin.inst.gallery.item')->with(compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $model = new InstGallery(['inst_id' => $id]);

        return view()->with(compact('model'));
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
        $model = new InstGallery();
        if ($model->fill($request->all()) && $model->save()) {
            $content = '1';
            $status = 200;
        } else {
            $content = '0';
            $status = 418;
        }

        return response($content, $status);
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
        response('0', 418);
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
        response('0', 418);
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
        $model = InstGallery::find($id);
        if ($model->fill($request->all()) && $model->save()) {
            $content = '1';
            $status = 200;
        } else {
            $content = '0';
            $status = 418;
        }

        return response($content, $status);
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
        if (InstGallery::destroy($id)) {
            $content = '1';
            $status = 200;
        } else {
            $content = '0';
            $status = 418;
        }

        return response($content, $status);
    }
}
