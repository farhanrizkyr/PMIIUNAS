<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Mapaba;
use App\Models\Tahun;
use App\Models\Progdi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MapabaController extends Controller
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
      
      $mapabas=Mapaba::where('archive','not')->orderby('created_at','desc')->get();
        return view ('Mapaba/mapaba',compact('mapabas'));
    }
    
   public function edithi($id)
    {
         $t=Tahun::orderby('created_at','desc')->get();
      $p=Progdi::orderby('created_at','desc')->get();
        $m=Mapaba::find($id);
        if ($m==false) {
          return view('Home/404');
        }
        return view ('Mapaba/edithi',compact('m','t','p'));

      }

    public function pdf()
    {
      $mapabas=Mapaba::where('archive','not')->orderby('created_at','desc')->get();
        return view ('Mapaba/printpdf',compact('mapabas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $t=Tahun::orderby('created_at','desc')->get();
      $p=Progdi::orderby('created_at','desc')->get();
        return view ('Mapaba/add',compact('t','p'));
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
         'name'=>'required|unique:mapabas',
         'hp'=>'required|numeric|unique:mapabas',
         'kampus'=>'required',
         'hp'=>'required|unique:mapabas',
         'tahun_id'=>'required',
         'progdi_id'=>'required',
         'pengalaman'=>'required',
         'minat'=>'required'
        ],
        [
         'name.required'=>'Silahkan diisi',
         'name.unique'=>'Nama Sudah Terdaftar',
         'hp.required'=>'Silahkan diisi',
         'hp.unique'=>'No HP sudah ada',
         'tahun_id.required'=>'Silahkan diisi',
         'progdi_id.required'=>'Silahkan diisi',
        'pengalaman.required'=>'Silahkan diisi',
       'kampus.required'=>'Silahkan diisi',
        'minat.required'=>'Silahkan diisi',
        ]);
        
        Mapaba::create([
         'name'=>request()->name,
         'hp'=>request()->hp,
         'kampus'=>request()->kampus,
         'pengalaman'=>request()->pengalaman,
        'minat'=>request()->minat,
        'slug'=>str::slug(request()->name),
        'progdi_id'=>request()->progdi_id,
        'tahun_id'=>request()->tahun_id,
        ]);
        return redirect('listmapaba')->with('pesan','Peserta Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapaba  $mapaba
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
     $m=Mapaba::where('slug',$slug)->first();
     if ($m==false) {
          return view('Home/404');
        }
     return view ('Mapaba/more1',compact('m'));
      
    }
    public function show1($slug)
    {
     $p=Mapaba::where('slug',$slug)->first();
        if ($p==false) {
          return view('Home/404');
        }
     return view ('Mapaba/more2',compact('p'));
      
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapaba  $mapaba
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $t=Tahun::orderby('created_at','desc')->get();
      $p=Progdi::orderby('created_at','desc')->get();
        $m=Mapaba::find($id);
        if ($m==false) {
          return view('Home/404');
        }
        return view ('Mapaba/edit',compact('m','t','p'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapaba  $mapaba
     * @return \Illuminate\Http\Response
     */
    public function update($id)
        {
        request ()->validate([
         'name'=>'required',
         'hp'=>'required',
         'kampus'=>'required',
         'hp'=>'required',
         'tahun_id'=>'required',
         'progdi_id'=>'required',
         'pengalaman'=>'required',
         'minat'=>'required'
        ],
        [
         'name.required'=>'Silahkan diisi',
         'name.unique'=>'Nama Sudah Terdaftar',
         'hp.required'=>'Silahkan diisi',
         'hp.unique'=>'No HP sudah ada',
         'tahun_id.required'=>'Silahkan diisi',
         'progdi_id.required'=>'Silahkan diisi',
        'pengalaman.required'=>'Silahkan diisi',
       'kampus.required'=>'Silahkan diisi',
        'minat.required'=>'Silahkan diisi',
        ]);
       
         Mapaba::find($id)->update([
         'name'=>request()->name,
         'hp'=>request()->hp,
         'kampus'=>request()->kampus,
         'pengalaman'=>request()->pengalaman,
        'minat'=>request()->minat,
        'slug'=>str::slug(request()->name),
        'progdi_id'=>request()->progdi_id,
        'tahun_id'=>request()->tahun_id,
        ]);
       
        return redirect('listmapaba')->with('edit','Peserta Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapaba  $mapaba
     * @return \Illuminate\Http\Response
     */
    public function ver($id)
    {
        $mapaba=Mapaba::find($id)->update([
        'archive'=>'approve',

        ]);

          return redirect('listmapaba')->with('edit','Peserta Berhasil di Approve Data Dipindahkan ke Data Arsip MAPABA');

    }


    public function destroy($id)
    {
       $mapaba=Mapaba::find($id);
       $mapaba->delete();

      return redirect('listmapaba')->with('pesan','Peserta Berhasil DiHapus');

    }

    public function destroyhistory($id)
    {
       $mapaba=Mapaba::find($id);
       $mapaba->delete();

      return redirect('/history-datamapaba')->with('pesan','Peserta Berhasil DiHapus');

    }

     public function updatehi($id)
        {
        request ()->validate([
         'name'=>'required',
         'hp'=>'required',
         'kampus'=>'required',
         'hp'=>'required',
         'tahun_id'=>'required',
         'progdi_id'=>'required',
        ],
        [
         'name.required'=>'Silahkan diisi',
         'name.unique'=>'Nama Sudah Terdaftar',
         'hp.required'=>'Silahkan diisi',
         'hp.unique'=>'No HP sudah ada',
         'tahun_id.required'=>'Silahkan diisi',
         'progdi_id.required'=>'Silahkan diisi',
        'pengalaman.required'=>'Silahkan diisi',
       'kampus.required'=>'Silahkan diisi',
        'minat.required'=>'Silahkan diisi',
        ]);
       
         Mapaba::find($id)->update([
         'name'=>request()->name,
         'hp'=>request()->hp,
         'kampus'=>request()->kampus,
        'slug'=>str::slug(request()->name),
        'progdi_id'=>request()->progdi_id,
        'tahun_id'=>request()->tahun_id,
        ]);
       
        return redirect('/history-datamapaba')->with('edit','Peserta Berhasil di Ubah');

      }
}

