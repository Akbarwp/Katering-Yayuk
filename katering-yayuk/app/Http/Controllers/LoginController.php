<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index() {
        Auth::logout();
        return view('login', [
            'title' => 'Login'
        ]);
    }

    function authenticate(Request $request) {
        $admin = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'admin',
        ];

        if (Auth::attempt($admin)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->with('loginError', 'Login failed!');
    }

    function logout(Request $request) {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
