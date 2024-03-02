<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemberitahuan;
use Illuminate\Support\Str;
class PemberitahuanController extends Controller


{

       public function __construct() 
    {
       $this->middleware('auth');
        $this->middleware('pengurus');
    }
    public function index()
    {
      $pem=Pemberitahuan::orderby('created_at','desc')->get();
     return view('Pemberitahuans/anc',compact('pem'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pemberitahuans/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
          'judulpem'=>'required',
          'gambar'=>'mimes:jpg,png,jpeg|max:2048',
          'body'=>'required'
        ],
        [
        'judulpem.required'=>'Wajib Diisi',
        'gambar.required'=>'Wajib Diisi',
        'gambar.mimes'=>'Gambar Wajib JPG,PNG,JPEG',
        'gambar.required'=>'Wajib Diisi',
        'body.required'=>'Wajib Diisi',
        ]);
        
        if (request()->gambar <> '') {
      $file=request()->file('gambar');
      $filename=$file->getClientOriginalName();
      $file->move(public_path('PosterPem'),$filename);
      
      Pemberitahuan::create([
       'judulpem'=>request()->judulpem,
       'slug'=>str::slug(request()->judulpem),
       'body'=>request()->body,
       'gambar'=>$filename,
        ]);
        } else {
        Pemberitahuan::create([
       'judulpem'=>request()->judulpem,
       'slug'=>str::slug(request()->judulpem),
       'body'=>request()->body,

         ]);
        }
        
        return redirect('/pemberitahuan')->with('pesan','Pemberitahuan Berhasil Di Buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemberitahuan  $pemberitahuan
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
           
        $pem=Pemberitahuan::where('slug',$slug)->first();
        if ($pem==false) {
          return view('Pemberitahuans/404');
        }
        return view('Pemberitahuans/more',compact('pem'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemberitahuan  $pemberitahuan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $pem=Pemberitahuan::find($id);
        if ($pem==false) {
          return view('Pemberitahuans/404');
        }
    return view('Pemberitahuans/edit',compact('pem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemberitahuan  $pemberitahuan
     * @return \Illuminate\Http\Response
     */
    public function update($id)
       {
        request()->validate([
          'judulpem'=>'required',
          'gambar'=>'mimes:jpg,png,jpeg|max:2048',
          'body'=>'required'
        ],
        [
        'judulpem.required'=>'Wajib Diisi',
        'gambar.required'=>'Wajib Diisi',
        'gambar.mimes'=>'Gambar Wajib JPG,PNG,JPEG',
        'body.required'=>'Wajib Diisi',
        ]);
        
        if (request()->gambar <> "") {
      $file=request()->file('gambar');
      $filename=$file->getClientOriginalName();
      $file->move(public_path('PosterPem'),$filename);
      
      Pemberitahuan::find($id)->update([
       'judulpem'=>request()->judulpem,
       'slug'=>str::slug(request()->judulpem),
       'body'=>request()->body,
       'gambar'=>$filename,
        ]);

      if (request()->gambar_lama) {
        unlink(public_path('PosterPem').'/'.request()->gambar_lama);
      }
        }
        else{
          Pemberitahuan::find($id)->update([
       'judulpem'=>request()->judulpem,
       'slug'=>str::slug(request()->judulpem),
       'body'=>request()->body,
        ]);
        }
        return redirect('/pemberitahuan')->with('pesan','Pemberitahuan Berhasil Di Ubah');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemberitahuan  $pemberitahuan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p=Pemberitahuan::find($id);
        if ($p->gambar <> '') {
          unlink(public_path('PosterPem').'/'.$p->gambar);
        }
        $p->delete ();
        return redirect('/pemberitahuan')->with('hapus','Pemberitahuan Berhasil Di Hapus');
    }



    }
