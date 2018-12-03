<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

class SettingsController extends Controller
{
    public function index()
    {
       return view('user.settings');
    }

    public function update_setting(Request $request)
    {
        if($request->has('name'))
        {
          $user = Auth::user();
          $user->name = $request->get('name');
          $user->save();
        }
      	if($request->hasFile('avatar')){
      		$avatar = $request->file('avatar');
      		$filename = time() . '.' . $avatar->getClientOriginalExtension();
      		Image::make($avatar)->resize(300, 300)->save( public_path('/storage/avatars/' . $filename ) );
      		$user = Auth::user();
      		$user->avatar = $filename;
      		$user->save();
      	}
      	return redirect()->back();
    }
}
