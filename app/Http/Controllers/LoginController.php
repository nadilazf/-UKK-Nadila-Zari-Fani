<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginPetugas()
    {
        return view('auth.login');
    }

    public function loginPetugas(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('petugas')->attempt(['username'=> $request->username, 'password'=> $request->password], $request->get('remember'))){
            $request->session()->regenerate();
            return redirect()->route('pengaduan.indexPetugas');
        }
        return back()->with('error', 'username atau password salah');
    }

    public function showLoginMasyarakat()
    {
        return view('auth.login');
    }

    public function loginMasyarakat(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('masyarakat')->attempt(['username'=> $request->username, 'password'=> $request->password], $request->get('remember'))){
            $request->session()->regenerate();
            return redirect()->route('pengaduan.index');
        }
        return back()->with('error', 'username atau password salah');
    }

    public function logout()
    {
        Auth::guard('masyarakat')->logout();
        Auth::guard('petugas')->logout();
        return redirect()->route('login')->with('sukses', 'logout berhasil');
    }
}
