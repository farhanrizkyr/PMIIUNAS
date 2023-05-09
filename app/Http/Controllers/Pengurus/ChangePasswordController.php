<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Rules\UbahPassword;
class ChangePasswordController extends Controller
{

       public function passwordpanitia()
     {
       return view('UserAdmin/password');
     }
   
 public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new UbahPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
       return redirect('/user')->with('pesan','Password Berhasil Di Ubah');
    }


}