<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('loginadmin/login');
    }

       public function proses_login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ],
    [

    'username.required'=>'Username Wajib Diisi',
    'password.required'=>'Password Wajib Diisi',
    ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home')->with('pesan','Berhasil Login');
        }

        return back()->withErrors([
            'username' => 'Periksa Kembali username dan password anda',
        ])->onlyInput('username');
    }


    public function logout( Request $request)
    {
    Auth::logout();
    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/home/login')->with('pesan','Berhasil logout');
    }
}
