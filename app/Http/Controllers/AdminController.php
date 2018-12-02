<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.admin', ['users'=>User::all()]);
    }

    public function users()
    {
        return view('admin.users-table', ['users'=>User::all()]);
    }

    public function admins()
    {
        return view('admin.admins-table', ['users'=>User::all()]);
    }

    public function users_data(Request $request, $id)
    {
        $user = User::find($id);
        $user->possibleCreateList = $request->get('possibleCreateList');
        $user->save();

        return redirect()->back();
    }

    public function access($id)
    {
        $user = User::find($id);
        $user->access = $user->access == true ? false : true;
        $user->save();

        return redirect()->back();
    }

    public function postAdminAssignRoles(Request $request)
    {
        $user = User::where('id', $request['user_id'])->first();
        $user->roles()->detach();
        if ($request['role_user']) {
            $user->roles()->attach(Role::where('name', 'User')->first());
        }
        if ($request['role_moderator']) {
            $user->roles()->attach(Role::where('name', 'Moderator')->first());
        }
        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }
        return redirect()->back();
    }
}
