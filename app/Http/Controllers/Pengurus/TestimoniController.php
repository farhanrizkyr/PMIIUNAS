<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimoni;
class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function __construct() 
    {
       $this->middleware('auth');
        $this->middleware('pengurus');
    }
    public function index()
    {
      $testimoni=Testimoni::orderby('created_at','desc')->get();
        return view('Testimoni/testimoni',compact('testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('Testimoni/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
        'name'=>'required',
        'gambar'=>'mimes:jpg,png,jpeg|max:2048',
        'catatan'=>'required',
        ],
        [
        'name.required' =>'Wajib Diisi',
        'gambar.required'=>'Wajib Diisi',
        'gambar.mimes'=>'Gambar Harus Jpg,Png,Jpeg',
        'gambar.max'=>'Ukuran Gambar harus 2Mb',
        'catatan.required'=>'Wajib Diisi',
        ]);
        
   if (request ()-> gambar <> "") {
        $gambar=request()->file('gambar');
      $namagambar=$gambar->getClientOriginalName();
      $gambar->move(public_path('FotoTestimoniKader'),$namagambar);
      Testimoni::create([
      'name'=>request()->name,
      'catatan'=>request()->catatan,
      'gambar'=>$namagambar,
      ]);
      } else {
        Testimoni::create([
      'name'=>request()->name,
      'catatan'=>request()->catatan,
      ]);
      } 
      
      return redirect('/testimoni')->with('pesan','Testimoni Berhasil di Tambah');
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function show(Testimoni $testimoni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $testimoni=Testimoni::find($id);
       if ($testimoni==false) {
          return view('Home/404');
       }
       return view('Testimoni/edit',compact('testimoni'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function update($id)
        {
        request()->validate([
        'name'=>'required',
        'gambar'=>'mimes:jpg,png,jpeg|max:2048',
        'catatan'=>'required',
        ],
        [
        'name.required' =>'Wajib Diisi',
        'gambar.required'=>'Wajib Diisi',
        'gambar.mimes'=>'Gambar Harus Jpg,Png,Jpeg',
        'gambar.max'=>'Ukuran Gambar harus 2Mb',
        'catatan.required'=>'Wajib Diisi',
        ]);
        
      if (request ()-> gambar <> "") {
        $gambar=request()->file('gambar');
      $namagambar=$gambar->getClientOriginalName();
      $gambar->move(public_path('FotoTestimoniKader'),$namagambar);
      Testimoni::find($id)->update([
      'name'=>request()->name,
      'catatan'=>request()->catatan,
      'gambar'=>$namagambar,
      ]);
      } else {
        Testimoni::find($id)->update([
      'name'=>request()->name,
      'catatan'=>request()->catatan,
      ]);
      } 
      
      return redirect('/testimoni')->with('pesan','Testimoni Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimoni=Testimoni::find($id);
        if ($testimoni <> "") {
         unlink(public_path('FotoTestimoniKader').'/'.$testimoni->gambar);
        }
        $testimoni->delete();
        return redirect('/testimoni')->with('hapus','Testimoni Berhasil di Hapus');
        
    }
}
