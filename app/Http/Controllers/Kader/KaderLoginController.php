<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kader;
use Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class KaderLoginController extends Controller
{

     protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 2; // Default is 1

  public function __construct()
{
$this->middleware('guest')->except('logout');
}
    public function login()
    {
       return view ('UserKader/login');
    }


   

 public function post_kader(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ],
    [

    'username.required'=>'Username Wajib Diisi',
    'password.required'=>'Password Wajib Diisi',
    ]);

        if (Auth::guard('kader')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/kader')->with('pesan','Berhasil Login');
        }

        return back()->withErrors([
            'username' => 'Periksa Kembali username dan password anda',
        ])->onlyInput('username');
    }

 public function logout(Request $request)
    {
        auth()->guard('kader')->logout();
        $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/kader/login')->with('pesan','Berhasil logout');
    }

}
