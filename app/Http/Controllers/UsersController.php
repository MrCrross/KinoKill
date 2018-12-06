<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\users;

class AddAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()) {
        return view('add.regAdmin');
        }
        else {
            return view('auth.login');
        }
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $reg = new users();
        $reg -> name = $request->input('name');
        $reg -> email = $request->input('email');
        $reg -> password = Hash::make($request-> input('password'));
        $reg -> role = 1;
        $reg -> save();

        return redirect()->route('home');
    }

}
