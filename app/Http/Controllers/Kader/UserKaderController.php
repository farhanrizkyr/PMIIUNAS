<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kader;
use Auth;
use Illuminate\Support\Carbon;
class UserKaderController extends Controller
{
  public function __construct()
{
   $this->middleware('auth:kader');
}
 

    public function index()
    {
     $waktu=Carbon::now();
        return view('UserKader/index',compact('waktu'));
    }

       public function profile()
    {
        return view('UserKader/setting');
    }

    public function change_profile()
    {
      
       return view('UserKader/change');
    }


    public function update($id)
    {
        request()->validate([
        'name'=>'required',
        'email'=>'required|email',
        'username'=>'required|alpha_dash',

        ],
        [
        'username.alpha_dash'=>'Tidak Boleh Ada Spasi',
        'name.required'=>'Tidak Boleh Kosong',
        'email.required'=>'Tidak Boleh Kosong',

        ]);

        Kader::find($id)->update(request()->all());
        return redirect('/user-profile')->with('pesan','User Berhasil Di Ubah');
    }


    public function check_avatar( Request $request,$id)
    {
          $user=Auth::user();
        request()->validate([
        'avatar'=>'required|mimes:jpg,png,jpeg|max:2048',

        ],

    [
    'avatar.required'=>'Wajib Di Isi',
    'avatar.mimes'=>'Wajib JPG,PNG,JPEG',
     'avatar.max'=>'Maximal 2 MB'
    ]);
       $filename=$user->avatar;
       if ($request->avatar) {
       
         $file=$request->avatar;
         $filename=$file->getClientOriginalName();
         $file->move(public_path('AvatarKader'),$filename);

         if (request()->avatar_lama) {
           unlink(public_path('AvatarKader').'/'.request()->avatar_lama);
         }
       }

       Kader::find($id)->update([
        'avatar'=>$filename,

       ]);

           return redirect('/user-profile')->with('pesan','User Account Berhasil DiUpdate');
    }

}