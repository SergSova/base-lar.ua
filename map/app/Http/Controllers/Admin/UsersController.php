<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 16.04.2018
 * Time: 11:45
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        $roles = Role::all();

        return view('admin.user.view')->with(compact('users', 'roles'));
    }

    public function setRole($user_id, $role)
    {
        User::find($user_id)->assignRole($role);

        return redirect()->back();
    }

    public function unsetRole($user_id, $role)
    {
        User::find($user_id)->removeRole($role);

        return redirect()->back();
    }

    public function destroy($user_id)
    {
        if (User::destroy($user_id)) {
            return response('1', 200);
        } else {
            return response('0', 405);
        }
    }

    public function userStatus($user, $status)
    {
        $user->property->status = $status;

        return $user->property->save() ? 1 : 0;

    }

    public function edit($user)
    {
        $sex_arr = ['m' => 'Муж.', 'w' => 'Женщ.'];

        return view('admin.user.form')->with(compact('user', 'sex_arr'));
    }

    public function update(Request $request, $user)
    {
        $r_arr = array_diff($request->all(), array('', null, false));
        $user->fill($r_arr);
        $user->property->fill($r_arr);
        if ($user->property->save() && $user->save()) {
            Session::flash('flash_message', 'Пользователь "'.strip_tags($user->name)." ($user->id)".'" обновлен');

            return redirect(route('user.index'));
        }

        return redirect(route('user.edit', $user->id))->withInput($request->input());
    }

}