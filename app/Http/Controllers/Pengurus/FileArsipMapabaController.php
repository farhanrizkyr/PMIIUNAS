<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\FileArsipMapaba;
use Illuminate\Http\Request;

class FileArsipMapabaController extends Controller
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
      $data_mapaba=FileArsipMapaba::orderby('created_at','desc')->get();
      return view ('ArsipMapaba/mapaba',compact('data_mapaba'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('ArsipMapaba/add');
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
        $filename=$file->getClientOriginalName();
        $file->move(public_path('FileArsipMAPABA'),$filename);
      FileArsipMapaba::create([
      'name'=>request()->name, 
      'file'=>$filename
      ]); 
      return redirect('/filearsipmapabaraya')->with('pesan','File Berhasil Di Upload');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileArsipMapaba  $fileArsipMapaba
     * @return \Illuminate\Http\Response
     */
    public function show(FileArsipMapaba $fileArsipMapaba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileArsipMapaba  $fileArsipMapaba
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file=FileArsipMapaba::find($id);
        return view('ArsipMapaba/edit',compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileArsipMapaba  $fileArsipMapaba
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
        $filename=$file->getClientOriginalName();
        $file->move(public_path('FileArsipMAPABA'),$filename);
      FileArsipMapaba::find($id)->update([
      'name'=>request()->name, 
      'file'=>$filename,
      ]);
      if (request()->file_lama) {
          unlink(public_path('FileArsipMAPABA').'/'.request()->file_lama);
      }
        } else {
       FileArsipMapaba::find($id)->update([
      'name'=>request()->name,
      ]); 
        }
        
      return redirect('/filearsipmapabaraya')->with('pesan','File Berhasil Di Ubah');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileArsipMapaba  $fileArsipMapaba
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapaba=FileArsipMapaba::find($id);
        if ($mapaba->file <> '') {
          unlink(public_path('FileArsipMAPABA').'/'.$mapaba->file);
        }
        
        $mapaba->delete();
        return redirect('/filearsipmapabaraya')->with('hapus','File Berhasil Di Hapus');  
    }
}