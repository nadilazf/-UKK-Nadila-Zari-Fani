<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;

class RegisterController extends Controller
{
    public function showRegisterMasyarakat()
    {
        return view('auth.register');
    }

    public function registerMasyarakat(Request $request)
    {
        $validateData = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        Masyarakat::create($validateData);

        return redirect()->route('login')->with('sukses', 'Registrasi berhasil');
    }
}
