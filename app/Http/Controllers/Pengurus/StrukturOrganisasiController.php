<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;

class StrukturOrganisasiController extends Controller
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
      $struktur=StrukturOrganisasi::latest()->get();
        return view ('Struktur/struktur',compact('struktur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Struktur/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
       request ()->validate([
       'name'=>'required|unique:struktur_organisasis',
        'gambar'=>'required|mimes:jpg,png,jpeg|max:2048',
        'biro'=>'required',
         ],
         [
         'name.required'=>'Tidak boleh kosong',
         'name.unique'=>'Data yang di input sudah ada',
         'gambar.required'=>'wajib di isi',
         'gambar.mimes'=>'Foto yang di input harus jpg,png,jpeg',
        'biro.required'=>'wajib di isi',
         ]);
         
         $file=request()->file('gambar');
         $filename=time().'.'.$file->getClientOriginalExtension();
         $file->move(public_path('FotoStruktur'),$filename);
         StrukturOrganisasi::create([
          'name'=>request()->name,
          'tw'=>request()->tw,
          'ig'=>request()->ig,
          'linkeld'=>request()->linkeld,
          'fb'=>request()->fb,
          'biro'=>request()->biro,
          'gambar'=>$filename,
           ]);
           return redirect('/strukturs')->with('pesan','Data Berhasil di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StrukturOrganisasi  $strukturOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function show(StrukturOrganisasi $strukturOrganisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StrukturOrganisasi  $strukturOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d=StrukturOrganisasi::find($id);
        if ($d==false) {
         return view('Home/404');
        }
        return view ('Struktur/edit',compact('d'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StrukturOrganisasi  $strukturOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function update($id)
         {
       request ()->validate([
       'name'=>'required',
        'gambar'=>'mimes:jpg,png,jpeg|max:2048',
        'biro'=>'required',
         ],
         [
         'name.required'=>'Tidak boleh kosong',
         'name.unique'=>'Data yang di input sudah ada',
         'gambar.required'=>'wajib di isi',
         'gambar.mimes'=>'Foto yang di input harus jpg,png,jpeg',
        'biro.required'=>'wajib di isi',
         ]);
         
         if (request()->gambar <> '') {
           $file=request()->file('gambar');
         $filename=time().'.'.$file->getClientOriginalExtension();
         $file->move(public_path('FotoStruktur'),$filename);
         StrukturOrganisasi::find($id)->update([
          'name'=>request()->name,
          'tw'=>request()->tw,
          'ig'=>request()->ig,
          'linkeld'=>request()->linkeld,
          'fb'=>request()->fb,
          'biro'=>request()->biro,
          'gambar'=>$filename,
           ]);

         if (request()->gambar_lama) {
             unlink(public_path('FotoStruktur').'/'.request()->gambar_lama);
         }
         } else {
           StrukturOrganisasi::find($id)->update([
          'name'=>request()->name,
          'tw'=>request()->tw,
          'ig'=>request()->ig,
          'linkeld'=>request()->linkeld,
          'fb'=>request()->fb,
          'biro'=>request()->biro,
           ]);
         }
         
           return redirect('/strukturs')->with('edit','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StrukturOrganisasi  $strukturOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $struktur=StrukturOrganisasi::findOrFail($id);
        
        if ($struktur->gambar <> '') {
          unlink(public_path('FotoStruktur').'/'.$struktur->gambar);
        }
        $struktur->delete();
        return redirect('/strukturs')->with('hapus','Data Berhasil di Hapus');
    }
}
