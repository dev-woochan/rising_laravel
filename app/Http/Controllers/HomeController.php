<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $boards = Board::latest()->limit(5)->get();
        return view("home", compact('boards'));
    }
}
