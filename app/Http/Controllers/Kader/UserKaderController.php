<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kader;
use Auth;
class UserKaderController extends Controller
{
        public function __construct()
{
   $this->middleware('auth:kader');
}
 

    public function index()
    {
        return view('UserKader/index');
    }

       public function profile()
    {
        return view('UserKader/setting');
    }

    public function change_profile($username)
    {
        $user=Kader::where('username',$username)->first();
       return view('UserKader/change',compact('user'));
    }


    public function update($id)
    {
        request()->validate([
        'name'=>'required',
        'email'=>'required|email:dns',
        'bio'=>'required',
        'username'=>'required',

        ]);

        Kader::find($id)->update(request()->all());
        return redirect('/user-profile')->with('pesan','User Berhasil Di Ubah');
    }


    public function check_avatar( Request $request,$id)
    {
          $user=Auth::user();
        request()->validate([
        'avatar'=>'required|mimes:jpg,png,jpeg|max:2048',

        ]);
       $filename=$user->avatar;
       if ($request->avatar) {
       
         $file=$request->avatar;
         $filename=$file->getClientOriginalName();
         $file->move(public_path('AvatarKader'),$filename);
       }

       Kader::find($id)->update([
        'avatar'=>$filename,

       ]);

           return redirect('/user-profile')->with('pesan','User Account Berhasil DiUpdate');
    }

}