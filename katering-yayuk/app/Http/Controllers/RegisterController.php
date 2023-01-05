<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register', [
            'title' => 'Register'
        ]);
    }

    public function register(Request $request) {
        User::create([
            'name' => $request->name,
            'role' => 'admin',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
