<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\FileArsipPengurus;
use Illuminate\Http\Request;

class FileArsipPengurusController extends Controller
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
      $data_komi=FileArsipPengurus::orderby('created_at','desc')->get();
        return view('ArsipPengurus/komi', compact('data_komi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('ArsipPengurus/add');
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
          'file'=>'required|mimes:pdf|max:3072',
        ],
       [
       'name.required'=>'Wajib Diisi',
       'file.required'=>'Wajib Diisi',
       'file.mimes'=>'Wajib PDF',
       'file.max'=>'Ukuran File Harus 3MB',
        ]);
        
        $file=request()->file('file');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('FileArsipPengurus'),$filename);
      FileArsipPengurus::create([
      'name'=>request()->name, 
      'file'=>$filename
      ]); 
      return redirect('/filearsipkomi')->with('pesan','File Berhasil Di Upload');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileArsipPengurus  $fileArsipPengurus
     * @return \Illuminate\Http\Response
     */
    public function show(FileArsipPengurus $fileArsipPengurus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileArsipPengurus  $fileArsipPengurus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    
    {
        $file=FileArsipPengurus::find($id);
        if ($file==false) {
          return redirect('/filearsipkomi');
        }
        return view ('ArsipPengurus/edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileArsipPengurus  $fileArsipPengurus
     * @return \Illuminate\Http\Response
     */
    public function update($id)
      {
        request()->validate([
          'name'=>'required',
          'file'=>'mimes:pdf|max:3072',
        ],
       [
       'name.required'=>'Wajib Diisi',
       'file.required'=>'Wajib Diisi',
       'file.mimes'=>'Wajib PDF',
       'file.max'=>'Ukuran File Harus 3MB',
        ]);
        
        if (request ()->file <> '') {
          $file=request()->file('file');
         $filename=time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('FileArsipPengurus'),$filename);
      FileArsipPengurus::find($id)->update([
      'name'=>request()->name, 
      'file'=>$filename
      ]);

      if (request()->file_lama) {
         unlink(public_path('FileArsipPengurus').'/'.request()->file_lama);
       } 
        } else {
       FileArsipPengurus::find($id)->update([
      'name'=>request()->name,
      ]); 
        }
        
      return redirect('/filearsipkomi')->with('pesan','File Berhasil Di Ubah');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileArsipPengurus  $fileArsipPengurus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file=FileArsipPengurus::find($id);
        if ($file->file <> '') {
          unlink(public_path('FileArsipPengurus').'/'.$file->file);
          
        }
        $file->delete();
        return redirect('/filearsipkomi')->with('hapus','File Berhasil Di Hapus');  
    }
}

