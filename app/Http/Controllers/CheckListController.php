<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CheckList;
use Auth;

class CheckListController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CheckList = CheckList::all();
        return view('home', array('CheckList'=>$CheckList));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $size = $request->get('size');
        $title = $request->get('title');
        return view('create', array('size'=>$size, 'title'=>$title));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->possibleCreateList != 0)
        {
          for($i = 1; $i <= $request->get('size'); $i++)
          {
            $item = new CheckList();
            $item->title = $request->get('title');
            $item->description = $request->get(''.$i.'');
            $item->user_id = Auth::user()->id;
            $item->list_id = $request->get('title').'_'.Auth::user()->id;
            $item->save();
          }

          $user = Auth::user();
          $user->possibleCreateList -= 1;
          $user->save();
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = CheckList::find($id);

        return view('show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = CheckList::find($id);

        return view('edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = CheckList::find($id);
        $item->description = $request->get('description');
        $item->user_id = Auth::user()->id;
        $item->save();

        return redirect()->route('home');
    }

    public function condition(Request $request, $id)
    {
        $item = CheckList::find($id);
        $item->condition = $item->condition == true ? false : true;
        $item->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CheckList::find($id)->delete();

        $user = Auth::user();
        $user->possibleCreateList += 1;
        $user->save();

        return redirect()->route('home');
    }
}
