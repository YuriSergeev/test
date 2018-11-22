<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
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
        return view('admin.admins-table', ['admins'=>Admin::all()]);
    }

    public function users_data(Request $request)
    {
        $user = User::find($request->get('id'));
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
}
