<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginMasyarakat()
    {
       return view ('auth.login');
    }

    public function loginMasyarakat(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('masyarakat')->attempt(['username' => $request->username, 'password'=>$request->password], $request->get('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('pengaduan.index');
        }
        return back()->with('error', 'username atau password salah');
    }

    public function showLoginPetugas()
    {
        # code...
    }
}
