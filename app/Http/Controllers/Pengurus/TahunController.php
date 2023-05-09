<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
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
      $tahun=Tahun::orderby('created_at','desc')->get();
        return view ('Tahun/tahun',compact('tahun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Tahun/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request ()->validate([
          'tahun'=>'required|unique:tahuns',
          
       ],
       [
       'tahun.required'=>'Wajib Diisi',
       'tahun.unique'=>'Tahun Angkatan sudah ada',
       ]);
      
       Tahun::create(request()->all());
       return redirect('/tahun')->with('pesan','Tahun Angkatan Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function show(Tahun $tahun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tahun=Tahun::find($id);
        if ($tahun==false) {
           return view('Home/404');
        }
        return view ('Tahun/edit',compact('tahun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
            {
        request ()->validate([
          'tahun'=>'required|unique:tahuns',
          
       ],
       [
       'tahun.required'=>'Wajib Diisi',
       'tahun.unique'=>'Tahun Angkatan sudah ada',
       ]);
      
       Tahun::find($id)->update(request()->all());
       return redirect('/tahun')->with('pesan','Tahun Angkatan Berhasil Di Ubah');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tahun=Tahun::find($id);
      $tahun->delete();
      return redirect('/tahun')->with('hapus','Berhasil DiHapus');
    }
}
