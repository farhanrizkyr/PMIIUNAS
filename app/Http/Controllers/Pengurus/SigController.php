<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sig;

class SigController extends Controller
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
    public function index()
    {
      $data_sig=Sig::orderby('created_at','desc')->get();
      $setuju=Sig::where('status','Sudah Divalidasi')->count();
      $belum=Sig::where('status','Belum Divalidasi')->count();
      return view('SIG/sig',compact('data_sig','setuju','belum'));
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
     * @param  \App\Models\Sig  $sig
     * @return \Illuminate\Http\Response
     */
    public function show(Sig $sig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sig  $sig
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sig=Sig::find($id);
        return view('SIG/edit',compact('sig'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sig  $sig
     * @return \Illuminate\Http\Response
     */
    public function update($id)
       {
    request ()->validate([
      'name'=>'required',
      'email1'=>'required',
      'email2'=>'required',
      'hp'=>'required',
      'asalrayon'=>'required',
    ]);
    
if (request()->sertifat <> '') {
    $file=request()->sertifat;
    $filename=request()->name.'.'.$file->extension();
    $file->move(public_path('Sertifikat_Sig'),$filename);
    Sig::find($id)->update([
     'name'=>request ()->name,
     'email1'=>request ()->email1,
     'email2'=>request ()->email2,
     'hp'=>request ()->hp,
     'status'=>request ()->status,
     'sertifat'=>$filename,
     'asalrayon'=>request ()->asalrayon,
    ]);
} else {
  Sig::find($id)->update([
     'name'=>request ()->name,
     'email1'=>request ()->email1,
     'email2'=>request ()->email2,
     'hp'=>request ()->hp,
     'status'=>request ()->status,
     'asalrayon'=>request ()->asalrayon,
      ]);
      
}

    return redirect('/listsig')->with('pesan','Data Berhasil Di Ubah');
    
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sig  $sig
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Sig::find($id);
        if ($delete->bukti1 <> '') {
           unlink(public_path('Bukti_Transfers').'/'.$delete->bukti1);
        }
        
        if ($delete->bukti2 <> '') {
           unlink(public_path('Bukti_Sertifikat').'/'.$delete->bukti2);
        }
        
         if ($delete->bukti3 <> '') {
           unlink(public_path('Bukti_SuratRekomendasi').'/'.$delete->bukti3);
        }
        if ($delete->sertifat <> '') {
           unlink(public_path('Sertifikat_Sig').'/'.$delete->sertifat);
        }
        $delete->delete ();
        return redirect ('/listsig')->with('hapus','Berhasil Dihapus');
    }
}
