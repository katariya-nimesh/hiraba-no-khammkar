<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (
            $request->username === env('ADMIN_USERNAME') &&
            Hash::check($request->password, bcrypt(env('ADMIN_PASSWORD')))
        ) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['Invalid credentials']);
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
