<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {

        return view('auth.login');
    }

    public function _login(Request $request)
    {

        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );
        $kredensil = $request->only('username', 'password');
        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if ($user->role == 'Distributor') {
                return redirect()->intended('distributor');
            } elseif ($user->role == 'Retailer') {
                return redirect()->intended('retailer');
            } else if ($user->role == 'Admin') {
                return redirect()->intended('admin');
            }
            return redirect()->intended('fail')->with('pesan', 'Anda tidak memiliki akses');
        }

        return redirect('login')->with('pesan', 'Akun anda tidak terdaftar');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
