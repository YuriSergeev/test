<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Checklist;
use App\Item;
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
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'size' => 'required|numeric|between:1,30',
        ]);

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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'size' => 'required|numeric|between:1,30',
        ]);

        if(Auth::user()->possibleCreateList != 0)
        {
          $checklist = new Checklist();
          $checklist->title = $request->get('title');
          $checklist->user_id = Auth::user()->id;
          $checklist->save();

          for($i = 1; $i <= $request->get('size'); $i++)
          {
            $item = new Item();
            $item->task = $request->get(''.$i.'');
            $item->checklist_id = $checklist->id;
            $item->save();
          }

          $user = Auth::user();
          $user->possibleCreateList -= 1;
          $user->numberOfCreated += 1;
          $user->save();

          \Session::flash('checklist_create', 'You have created CheckList');
        }


        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('edit', ['checklist' => Checklist::find($id)]);
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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $checklist = Checklist::find($id);
        $checklist->title = $request->get('title');
        $checklist->save();

        foreach ($checklist->items as $item) {
            $item = Item::find($item->id);
            $item->task = $request->get('' . $item->id . '');
            $item->save();
        }

        \Session::flash('checklist_edited', 'You have successfully edited CheckList');

        return redirect()->route('home');
    }

    public function condition($id)
    {
        $item = Item::find($id);
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
    public function destroyList($id)
    {
        $checklist = Checklist::find($id);

        foreach($checklist->items as $item)
        {
            Item::find($item->id)->delete();
        }

        $checklist->delete();

        $user = Auth::user();
        $user->possibleCreateList += 1;
        $user->numberOfCreated -= 1;
        $user->save();

        \Session::flash('checklist_destroy', 'You have successfully deleted CheckList');

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        Item::find($id)->delete();
        return redirect()->back();
    }
}
