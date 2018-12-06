<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $films = DB::table('films')->get();
        return view('home')->with(['films' => $films]);

    }
    public function mail()
    {
        return view('mail');

    }
}
