<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BlockController extends Controller
{
    public function index()
    {
        return view('block');
    }
}
