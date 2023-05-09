<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UserPanitiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct() 
    {
       $this->middleware('auth');
    }
   public function settingspanitia()
     {

       return view('UserAdmin/profile');
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_avatarpanitia(Request $request,$id)
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
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function ubahpanitia($username)

     {
      $data=User::where('username',$username)->first();
       if ($data==false) {
         return view('UserAdmin/404');
       }
       return view('UserAdmin/ubahuser',compact('data'));
     }

     public function updatepanitia($id)
     {
         request()->validate([
       'name'=>'required',
       'bio'=>'required',
       'username'=>'required',
       'email'=>'required',

      ],
      [
       'name.required'=>'Wajib Diisi',
       'email.required'=>'Wajib Diisi',
       'username.required'=>'Wajib Diisi',
       'bio.required'=>'Wajib Diisi',

      ]);
       $user=User::find($id);
         User::find($id)->update(request()->all());
         return redirect('/user/')->with('pesan','User Account Berhasil DiUpdate');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function hapusakunpanitia($id)
     {
       $user=User::find($id);
       if ($user->avatar <> '') {
        unlink(public_path('Avatar').'/'.$user->avatar);
       }
       $user->delete();
       return redirect('/home/login')->with('hapus','User Account Berhasil DiHapus');
     }

}
