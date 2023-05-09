<?php

namespace App\Http\Controllers\Pengurus;

use App\Models\Slider;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
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
     $sliders=Slider::orderby('created_at','desc')->get();
     return view('Slider/index',compact ('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Slider/add');
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
         'name'=>'required',
         'gambar'=>'required|mimes:jpg,png,jpeg|max:2048',
        ],
        [ 
         'name.required'=>'Wajib Diisi',
         'gambar.required'=>'Wajib Diisi',
         'gambar.mimes'=>'Gambar Wajib JPG,PNG dan JPEG',
         'gambar.max'=>'Ukuran Gambar maximal 2MB',
        ]);
        
     $file=request()->file('gambar');
     $filename=$file->getClientOriginalName ();
     $file->move(public_path('Slider'),$filename);
     
     Slider::create([
     'name'=>request()->name,
     'slug'=>str::slug(request ()->name),
     'links'=>request()->links,
     'gambar'=>$filename,
     ]);
     return redirect('/sliders')->with('pesan','Slider Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider=Slider::find($id);

        if ($slider==false) {
            return view('Slider/404');
        }
        return view('Slider/edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update($id)
         {
        request()->validate([
         'name'=>'required',
         'gambar'=>'mimes:jpg,png,jpeg|max:2048',
        ],
        [ 
         'name.required'=>'Wajib Diisi',
         'gambar.required'=>'Wajib Diisi',
         'gambar.mimes'=>'Gambar Wajib JPG,PNG dan JPEG',
         'gambar.max'=>'Ukuran Gambar maximal 2MB',
        ]);
        
     if (request()->gambar <> "") {
       $file=request()->file('gambar');
     $filename=$file->getClientOriginalName ();
     $file->move(public_path('Slider'),$filename);
     
     Slider::find($id)->update ([
     'name'=>request()->name,
     'slug'=>str::slug(request ()->name),
     'links'=>request()->links,
     'gambar'=>$filename,
     ]);
     } else {
       Slider::find($id)->update ([
     'name'=>request()->name,
     'slug'=>str::slug(request ()->name),
     'links'=>request()->links,
     ]);
     }
     
     return redirect('/sliders')->with('pesan','Slider Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=Slider::find($id);
        if ($slider <> '') {
          unlink(public_path('Slider').'/'.$slider->gambar);
        }
        
        $slider->delete ();
        return redirect('/sliders')->with('hapus','Slider Berhasil di Hapus');
    }
}