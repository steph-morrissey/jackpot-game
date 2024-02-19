<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LootOptions;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    public function index () 
    {
        Session::put(['credits', '10']);

        return view('game');
    }
}
