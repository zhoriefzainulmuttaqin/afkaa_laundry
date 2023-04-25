<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('access.login');
    }

    public function login(Request $request)
    {
        $request = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // dump($request); // tambahkan dump disini
        // die(); // tambahkan die disini


        if (Auth::attempt($request)) {
            return redirect('transaction');
        }
        return redirect()->back()->with('error', 'Username or Password Are Wrong.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        return view('access/register');
    }
}
