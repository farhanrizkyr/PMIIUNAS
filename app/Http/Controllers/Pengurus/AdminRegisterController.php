<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
class AdminRegisterController extends Controller
{

  public function __construct() 
    {
      $this->middleware('auth');
       $this->middleware('pengurus');

    }
        public function add()
     {
       return view('UserAdmin/adduser');
     }

   public function daftar()
   {
      request()->validate([
       'name'=>'required',
       'username'=>'required|unique:users',
       'email'=>'required|email:dns|unique:users',
       'password'=>'required|confirmed|min:5',


      ],

      [

      'name.required'=>'Wajib Diisi',
      'email.required'=>'Wajib Diisi',
      'email.email'=>'Tidak valid',
      'email.unique'=>'Tidak Boleh Sama',
      'username.required'=>'Wajib Diisi',
       'username.unique'=>'Tidak Boleh Sama',
      'username.required'=>'Wajib Diisi',
      'password.required'=>'Wajib Diisi',
      'password.confirmed'=>' Password Tidak Sesuai ',
      'password.min'=>'Password Tidak Boleh dari kurang 5 karakter'
      ]);
      User::create([
        'name'=>request()->name,
        'email'=>request()->email,
        'role'=>request()->role,
        'username'=>request()->username,
        'password'=>hash::make(request()->password),

      ]);
      return redirect('/anggota_pengurus')->with('pesan','User Account Berhasil DiBuat');
   }


}
