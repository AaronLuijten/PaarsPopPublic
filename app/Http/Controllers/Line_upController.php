<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lineup;
use Illuminate\Http\Request;

class Line_upController extends Controller
{
    public function index()
    {
        $lineup = Lineup::all();

        return view('line_up.index', compact('lineup'));
    }

    public function create()
    {
        return view('line_up.create');
    }
}
