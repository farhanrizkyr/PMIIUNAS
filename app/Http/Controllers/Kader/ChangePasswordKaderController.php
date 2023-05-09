<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\Kader;
use App\Rules\UbahPasswordKader;
class ChangePasswordKaderController extends Controller
{
           public function __construct()
{
   $this->middleware('auth:kader');
}
    public function password()
    {
        return view('UserKader/password');
    }

     public function proses(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new UbahPasswordKader],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        Kader::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
       return redirect('/user-profile')->with('pesan','Password Berhasil Di Ubah');
    }

}
