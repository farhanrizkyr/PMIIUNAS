<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Afirasi;
use Auth;
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

       Afirasi::create([
        'catatan'=>request()->catatan,
        'kader_id'=>Auth::user()->id,

       ]);
       return redirect('kader/testimoni')->with('pesan','Testimoni Berhasil Di Buat');
   }

   public function edit($id)
   {
      $data=Afirasi::find($id);
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
}
