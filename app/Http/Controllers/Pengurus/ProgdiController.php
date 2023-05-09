<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Progdi;
class ProgdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct() 
    {
       $this->middleware('auth');;
    }
    public function index()
    {
      $progdi=Progdi::orderby('created_at','desc')->get();
        return view ('Progdi/progdi',compact('progdi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Progdi/add');
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
          'progdi'=>'required|unique:progdis',
          
       ],
       [
       'progdi.required'=>'Wajib Diisi',
       'progdi.unique'=>'Program Studi sudah ada',
       ]);
      
       Progdi::create(request()->all());
       return redirect('/progdi')->with('pesan','Program Studi Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Progdi  $progdi
     * @return \Illuminate\Http\Response
     */
    public function show(Progdi $progdi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Progdi  $progdi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $progdi=Progdi::find($id);
        if ($progdi==false) {
           return view('Home/404');
        }
        return view('Progdi/edit',compact('progdi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Progdi  $progdi
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      request ()->validate([
          'progdi'=>'required|unique:progdis',
          
       ],
       [
       'progdi.required'=>'Wajib Diisi',
       'progdi.unique'=>'Program Studi sudah ada',
       ]);
      
       Progdi::find($id)->update(request()->all());
       return redirect('/progdi')->with('pesan','Program Studi Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Progdi  $progdi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $progdi=Progdi::find($id);
        $progdi->delete();
        return redirect('/progdi')->with('hapus','Program Studi Berhasil Di Hapus');
    }
}