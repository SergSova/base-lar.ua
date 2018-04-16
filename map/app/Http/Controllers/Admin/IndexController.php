<?php

/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 13.03.2018
 * Time: 14:56
 */

namespace App\Http\Controllers\Admin;

class IndexController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        return view('admin.index');
    }
}