<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Mrc;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MrcController extends Controller
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
      $mrc=Mrc::orderby('created_at','desc')->get();
        return view ('Mrc/mrc',compact('mrc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Mrc/add');
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
         'produk'=>'required',
         'gambar'=>'mimes:jpg,png,jpeg|max:2048',
         'harga'=>'required',
         'desc'=>'required',
         'cp'=>'required',
        
        ],
        [
        'produk.required'=>'Wajib Diisi',
        'gambar.required'=>'Wajib Diisi',
        'gambar.mimes'=>'Wajib Jpg,Png,Jpeg',
        'gambar.max'=>'Maximal 2MB',
        'harga.required'=>'Wajib Diisi',
        'cp.required'=>'Wajib Diisi',
        'desc.required'=>'Wajib Diisi',
        ]);
        
       if (request()->gambar <> '') {
           $file=request()->file('gambar');
        $filename=$file->getClientOriginalName();
        $file->move(public_path('Mrc'),$filename);
        Mrc::create([
        'produk'=>request()->produk,
        'cp'=>request()->cp,
        'slug'=>str::slug(request()->produk),
        'desc'=>request()->desc,
        'harga'=>request()->harga,
        'diskon'=>request()->diskon,
        'gambar'=>$filename,
        ]);
       } else {
          Mrc::create([
        'produk'=>request()->produk,
        'cp'=>request()->cp,
        'slug'=>str::slug(request()->produk),
        'desc'=>request()->desc,
        'harga'=>request()->harga,
        'diskon'=>request()->diskon,
        ]);
       }
       
        return redirect('/merchandise')->with('pesan','merchandise Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mrc  $mrc
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
     $slug=Mrc::where('slug',$slug)->first();

     if ($slug==false) {
        return view('Mrc/404');
     }
        return view('Mrc/detail',compact('slug'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mrc  $mrc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mrc=Mrc::find($id);
         if ($mrc==false) {
        return view('Mrc/404');
     }
        return view('Mrc/edit',compact('mrc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mrc  $mrc
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
           
        request()->validate([
         'produk'=>'required',
         'gambar'=>'mimes:jpg,png,jpeg|max:2048',
         'harga'=>'required',
         'desc'=>'required',
         'cp'=>'required',
        
        ],
        [
        'produk.required'=>'Wajib Diisi',
        'gambar.required'=>'Wajib Diisi',
        'gambar.mimes'=>'Wajib Jpg,Png,Jpeg',
        'gambar.max'=>'Maximal 2MB',
        'harga.required'=>'Wajib Diisi',
        'cp.required'=>'Wajib Diisi',
        'desc.required'=>'Wajib Diisi',
        ]);
        
         if (request ()->gambar <> '') {
        $file=request()->file('gambar');
        $filename=$file->getClientOriginalName();
        $file->move(public_path('Mrc'),$filename);
        Mrc::find($id)->update([
        'produk'=>request()->produk,
        'cp'=>request()->cp,
        'status'=>request()->status,
        'desc'=>request()->desc,
        'diskon'=>request()->diskon,
        'harga'=>request()->harga,
        'gambar'=>$filename,
        ]);

        if (request()->gambar_lama) {
          unlink(public_path('Mrc').'/'.request()->gambar_lama);
        }
         } else {
           Mrc::find($id)->update([
        'produk'=>request()->produk,
        'cp'=>request()->cp,
        'status'=>request()->status,
        'desc'=>request()->desc,
        'diskon'=>request()->diskon,
        'harga'=>request()->harga,
        ]);
         }
         
        return redirect('/merchandise')->with('pesan','merchandise Berhasil Di Edit');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mrc  $mrc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mrc=Mrc::find($id);
        if ($mrc->gambar <> '') {
        unlink(public_path('Mrc').'/'.$mrc->gambar);
        }
        $mrc->delete();
     return redirect('/merchandise')->with('hapus','merchandise Berhasil Di Hapus');
    }
}

