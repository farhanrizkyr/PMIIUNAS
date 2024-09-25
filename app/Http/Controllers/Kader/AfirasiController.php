<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Afirasi;
use Illuminate\Support\Facades\Auth;
class AfirasiController extends Controller
{

      public function __construct()
{
   $this->middleware('auth:kader');
}
   public function index($value='')
   {
       $datas=Afirasi::latest()->where('kader_id',auth()->user()->id)->get();
       return view('Afirasi.index',compact('datas'));
   }

   public function create()
   {
       request()->validate([
        'catatan'=>'required',
       ],

       [
        'catatan.required'=>'Wajib Diisi',

      ]);


 if (auth::user()->status=='active') {
       Afirasi::create([
        'catatan'=>request()->catatan,
        'kader_id'=>Auth::user()->id,

       ]);
        
       return redirect('kader/testimoni')->with('pesan','Testimoni Berhasil Di Buat');
   }
       if (auth::user()->status=='disable') {
           return redirect('kader/testimoni')->with('gagal','Testimoni Gagal Di Buat');
     }
   }

   public function edit($id)
   {
     $data=Afirasi::find($id);
     if($data==false) {    
       return redirect('/kader/testimoni')->with('pesan','Data Tidak Ada');
     }
     if (auth::user()->status=='disable') {
          return redirect('/kader/testimoni')->with('gagal','Anda Sementara Tidak Bisa Mengedit Testimoni');
     }
      return view('Afirasi.edit',compact('data'));
   }

    public function proses_edit($id)
   {
       request()->validate([
        'catatan'=>'required',
       ],

       [
        'catatan.required'=>'Wajib Diisi',

      ]);

       Afirasi::find($id)->update([
        'catatan'=>request()->catatan,
        'kader_id'=>Auth::user()->id,

       ]);

        return redirect('kader/testimoni')->with('pesan','Testimoni Berhasil Di Ubah');
      }


      public function delete($id)
      {
          $data=Afirasi::find($id);
          $data->delete();
            return redirect('kader/testimoni')->with('pesan','Testimoni Berhasil Di Hapus');
      }
}
