<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\ProfileRayon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfileRayonController extends Controller
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
      
      $rayons=ProfileRayon::orderby('created_at','desc')->get();
        return view ('Rayon/rayon',compact('rayons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Rayon/add');
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
          'title'=>'required',
          'body'=>'required',
          'gambar'=>'required|mimes:jpg,png,jpeg|max:2048',
      ],
      [
      'title.required'=>'Wajib Diisi',
      'body.required'=>'Wajib Diisi',
      'gambar.required'=>'Wajib Diisi',
      'gambar.max'=>'Maximal 2MB',
      'gambar.mimes'=>'Wajib JPG,PNG,JPEG',
      ]);
      $file=request ()->file('gambar');
      $filename=$file->getClientOriginalName();
      $file->move(public_path('LogoRayon'),$filename);
      
      ProfileRayon::create([
      'title'=>request()->title,
      'slug'=>str::slug(request()->title),
      'body'=>request()->body,
      'gambar'=>$filename,
       ]);
       return redirect('/profilesrayon')->with('pesan','Profile Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileRayon  $profileRayon
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $rayon=ProfileRayon::where('slug',$slug)->first();
        return view ('Rayon/more',compact('rayon'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileRayon  $profileRayon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $rayon=ProfileRayon::find($id);
      if ($rayon==false) {
         return view('Home/404');
        }
     return view('Rayon/edit',compact('rayon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileRayon  $profileRayon
     * @return \Illuminate\Http\Response
     */
    public function update($id)
       {
        request ()->validate([
          'title'=>'required',
          'body'=>'required',
          'gambar'=>'mimes:jpg,png,jpeg|max:2048',
      ],
      [
      'title.required'=>'Wajib Diisi',
      'body.required'=>'Wajib Diisi',
      'gambar.required'=>'Wajib Diisi',
      'gambar.max'=>'Maximal 2MB',
      'gambar.mimes'=>'Wajib JPG,PNG,JPEG',
      ]);
      if (request()->gambar <> '') {
        $file=request ()->file('gambar');
      $filename=$file->getClientOriginalName();
      $file->move(public_path('LogoRayon'),$filename);
      
      ProfileRayon::find($id)->update([
      'title'=>request()->title,
      'slug'=>str::slug(request()->title),
      'body'=>request()->body,
      'gambar'=>$filename,
       ]);
      } else {
        ProfileRayon::find($id)->update([
      'title'=>request()->title,
      'slug'=>str::slug(request()->title),
      'body'=>request()->body,
       ]);
      }
      
       return redirect('/profilesrayon')->with('pesan','Profile Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileRayon  $profileRayon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rayon=ProfileRayon::find($id);
        if ($rayon->gambar <> '') {
       unlink(public_path('LogoRayon').'/'.$rayon->gambar);
        }
        $rayon->delete ();
        return redirect('/profilesrayon')->with('hapus','Profile Berhasil Di Hapus');
        
    }
}
