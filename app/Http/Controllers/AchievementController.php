<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Achievement;
use Auth;

class AchievementController extends Controller
{
    public function index()
    {
       return view('user.achievement');
    }
}
