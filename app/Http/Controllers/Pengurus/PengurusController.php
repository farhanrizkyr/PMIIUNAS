<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use App\Models\Tahun;
use App\Models\Progdi;
use Illuminate\Http\Request;

class PengurusController extends Controller
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
        $datas=pengurus::where('status','active')->orderby('created_at','desc')->get();
       return view('pengurus/index',compact('datas'));
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
      return view('pengurus/add',compact('t','p'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePengurusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       request()->validate([
       'nama'=>'required|unique:penguruses',
       'progdi_id'=>'required',
       'tahun_id'=>'required',
       'tempat'=>'required',
       'tanggallahir'=>'required',
       'email'=>'required|email',
       'hp'=>'required|numeric',
       'alamat'=>'required',

       ],
       [
        'nama.required'=>'Wajib Diisi',
        'nama.unique'=>'Nama Sudah ada',
        'progdi_id.required'=>'Wajib Diisi',
        'tahun_id.required'=>'Wajib Diisi',
        'tempat.required'=>'Wajib Diisi',
        'tanggallahir.required'=>'Wajib Diisi',
        'email.required'=>'Wajib Diisi',
        'email.email'=>'Tidak valid',
        'hp.required'=>'Wajib Diisi',
        'hp.numeric'=>'Wajib Angka',
        'alamat.required'=>'Wajib Diisi',

      ]);
       pengurus::create(request()->all());
       return redirect('/listpengurus')->with('pesan','Data Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function show(Pengurus $pengurus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $t=Tahun::orderby('created_at','desc')->get();
        $p=Progdi::orderby('created_at','desc')->get();

        $data=Pengurus::find($id);
      return view('pengurus/edit',compact('t','p','data'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengurusRequest  $request
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function update($id)
   {
       request()->validate([
       'nama'=>'required',
       'progdi_id'=>'required',
       'tahun_id'=>'required',
       'tempat'=>'required',
       'tanggallahir'=>'required',
       'email'=>'required|email',
       'hp'=>'required|numeric',
       'alamat'=>'required',

       ],
       [
        'nama.required'=>'Wajib Diisi',
        'progdi_id.required'=>'Wajib Diisi',
        'tahun_id.required'=>'Wajib Diisi',
        'tempat.required'=>'Wajib Diisi',
        'tanggallahir.required'=>'Wajib Diisi',
        'email.required'=>'Wajib Diisi',
        'email.email'=>'Tidak valid',
        'hp.required'=>'Wajib Diisi',
        'hp.numeric'=>'Wajib Angka',
        'alamat.required'=>'Wajib Diisi',

      ]);
       pengurus::find($id)->update(request()->all());
       return redirect('/listpengurus')->with('pesan','Data Berhasil Di Ubah');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=pengurus::find($id);
        $user->delete();
        return redirect('/listpengurus')->with('hapus','Telah Di Hapus');
    }


    public function demisioner($id)
    {
        $user=pengurus::find($id)->update([
         'status'=>'demisioner',

        ]);

       return redirect('/listpengurus')->with('pesan','Telah Demisioner Data Telah Di Pindahkan ke Data Import pengurus');

    }
}
