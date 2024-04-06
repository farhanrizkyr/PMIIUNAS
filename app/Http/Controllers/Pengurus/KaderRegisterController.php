<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Kader;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Str;
class KaderRegisterController extends Controller
{

    function __construct()
    
    {
      $this->middleware('auth');
       $this->middleware('pengurus');

    
    }

 
     public function daftarkader()
   {
      request()->validate([
       'name'=>'required',
       'username'=>'required|unique:kaders',
       'email'=>'required|email:dns|unique:kaders',
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
      'password.min'=>'password Tidak Boleh kurang dari 5 karakter',
      ]);
     Kader::create([
        'name'=>request()->name,
        'email'=>request()->email,
        'username'=>Str::lower(request()->username),
        'password'=>hash::make(request()->password),

      ]);
      return redirect('/anggota_kader')->with('pesan','User Account Berhasil DiBuat');
   }
}
