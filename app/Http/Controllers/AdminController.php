<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CheckList;
use App\User;
use App\Admin;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.admin', array('CheckList'=>CheckList::all(), 'users'=>User::all()));
    }

    public function users()
    {
        return view('admin.users-table', array('users'=>User::all()));
    }

    public function admins()
    {
        return view('admin.admins-table', array('admins'=>Admin::all()));
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

    public function admin_access($id)
    {
        $admin = Admin::find($id);
        $admin->access = $admin->access == true ? false : true;
        $admin->save();
        
        return redirect()->back();
    }

}
