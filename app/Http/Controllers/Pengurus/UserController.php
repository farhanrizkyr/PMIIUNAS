<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kader;
use Session;
use Auth;
use  Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
 
    public function __construct() 
    {
       $this->middleware('auth');
       $this->Kader =new Kader();
        $this->middleware('pengurus');
    }

     public function password()
     {
       return view('UserAdmin/password');
     }
    public function pengurus()
     {
      $users=User::orderby('created_at','desc')->get();
      $pengurus=User::where('role','Pengurus')->count();
      $panitia=User::where('role','Panitia')->count();
       return view('UserAdmin/user',compact('users','pengurus','panitia'));
     }

     public function add()
     {
       return view('UserAdmin/adduser');
     }
      public function addkader()
     {
       return view('UserAdmin/addkader');
     }
     
     
        public function kaders()
     {
       $kaders=Kader::orderby('created_at','desc')->get();
       $aktif=Kader::where('status','active')->count();
       $not=Kader::where('status','disable')->count();
      $total=DB::table('kaders')->count();
       return view('UserAdmin/kader',compact('kaders','not','aktif','total'));
     }

    public function settings()
     {

       return view('UserAdmin/profile');
     }

     public function settingskader()
     {
       return view('UserAdmin/profilekader');
     }

  

     public function destroy($id)
     {
       $user=User::find($id);
       if ($user->avatar <> '') {
        unlink(public_path('Avatar').'/'.$user->avatar);
       }
       $user->delete();
       return redirect('/anggota_pengurus')->with('pesan','User Account Berhasil DiHapus');
     }

     public function ubah($username)

     {
      
       return view('UserAdmin/ubahuser',compact('data'));
     }


     public function update($id)
     {

      request()->validate([
       'name'=>'required',
       'username'=>'required',
       'email'=>'required',

      ],
      [
       'name.required'=>'Wajib Diisi',
       'email.required'=>'Wajib Diisi',
       'username.required'=>'Wajib Diisi',

      ]);
       $user=User::find($id);
         User::find($id)->update(request()->all());
         return redirect('/user/')->with('pesan','User Account Berhasil DiUpdate');
     }


     public function update_avatar(Request $request,$id)
     {
      $user=Auth::user();
       request()->validate([
      'avatar'=>'required|mimes:jpg,png,jpeg',

       ],
      [
      'avatar.required'=>'Wajib Diisi',
       'avatar.mimes'=>'Wajib JPG,PNG,JPEG'

     ]);
 $filename=$user->avatar;
       if ($request->avatar) {
       
         $file=$request->avatar;
         $filename=$file->getClientOriginalName();
         $file->move(public_path('Avatar'),$filename);
          if (request()->avatar_lama) {
           unlink(public_path('Avatar').'/'.request()->avatar_lama);
         }
       }

       User::find($id)->update([
        'avatar'=>$filename,

       ]);

           return redirect('/user/')->with('pesan','User Account Berhasil DiUpdate');
     }


     public function role($username)
     {
       $user=User::where('username',$username)->first();
        if ($user==false) {
          return view('Home/404');
        }
       return view('UserAdmin/ubahrole',compact('user'));
     }

     public function proses($id)
     {
       User::find($id)->update(request()->all());
        return redirect('/anggota_pengurus/')->with('pesan','User Account Berhasil DiUpdate');
     }

 public function hapusakun($id)
     {
       $user=User::find($id);
       if ($user->avatar <> '') {
        unlink(public_path('Avatar').'/'.$user->avatar);
       }
       $user->delete();
       return redirect('/home/login')->with('hapus','User Account Berhasil DiHapus');
     }



     public function status($id)
     {
       $user=Kader::find($id);
       if ($user==false) {
         return view('UserAdmin/404');
       }
       return view('UserAdmin/ubahstatus',compact('user'));
     }


     public function proses_ubah($id)
     {
       $data=[
        'status'=>request()->status,
       ];
       $this->Kader->ubahstatus($id,$data);
       return redirect('/anggota_kader/')->with('pesan','User Account Berhasil DiUpdate');

     }


     public function detailkader($username)
     {
      $user=Kader::where('username',$username)->first();

      if ($user==false) {
        
       return redirect('/anggota_kader/');
      }
       return view('UserAdmin/profilekader',compact('user'));
     }

      public function hapus_kader($id)
     {
      $kaderuser=Kader::find($id);
      if ($kaderuser->avatar <> '') {
         unlink(public_path('AvatarKader').'/'.$kaderuser->avatar);
        }  
       $kaderuser->delete();
       return redirect('/anggota_kader')->with('pesan','Avatar Berhasil DiHapus');
     }


     public function postingan_kaders(Kader $user)
     {
      $data=$user->posts;

      if ($data->count()<1) {
        return redirect('/anggota_kader');
      }
       return view('UserAdmin/postingan_kaders',compact('data','user'));
     }


     public function ubah_password_kader($id)
     {
      $data=Kader::find($id);
       if ($data==false) {
        
       return redirect('/anggota_kader/');
      }
        return view('UserAdmin/ubah_password_kader',compact('data'));
     }


     public function prosess($id)
     {
       request()->validate([
        'password'=>'required|confirmed',

       ]);
        Kader::find($id)->update([
        'password'=>Hash::make(request()->password),

        ]);
        return redirect('/anggota_kader')->with('pesan','Password Berhasil DiUpdate');
     }
     
}

