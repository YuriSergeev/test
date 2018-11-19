<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CheckList;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CheckList = CheckList::all();
        $itemEdit = NULL;
        return view('home', array('CheckList'=>$CheckList))->with('itemEdit', $itemEdit);
    }

    public function welcome()
    {
        return view('welcome');
    }

}
