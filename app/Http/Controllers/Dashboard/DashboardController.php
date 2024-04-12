<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sig;
use App\Models\Tahun;
use App\Models\Progdi;
use App\Models\Mapaba;
use App\Models\Mrc;
use Illuminate\Support\Str;
class DashboardController extends Controller
{
  
  public function formapaba ()
  {
    $t=Tahun::orderby('created_at','desc')->get();
      $p=Progdi::orderby('created_at','desc')->get();
    return view('Dashboard/form_pendaftaran/Mapaba_Form/mapaba',compact('t','p'));
  }
  
  public function tambah(Request $request)
    {
        request ()->validate([
         'name'=>'required|unique:mapabas',
         'hp'=>'required|unique:mapabas',
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
        return redirect('formpendaftaranMapaba')->with('pesan','Peserta Berhasil di Tambah');
    }
  
  public function formsig()
  {
    return view('Dashboard/form_pendaftaran/sig_Form/sig');
  }
  
  public function simpan_sig()
  {
    request ()->validate([
      'name'=>'required|unique:sigs',
      'email1'=>'required|unique:sigs',
      'email2'=>'required|unique:sigs',
      'hp'=>'required|unique:sigs',
      'asalrayon'=>'required',
      'bukti1'=>'required|mimes:jpg,png,jpeg',
      'bukti2'=>'required|mimes:pdf',
      'bukti3'=>'required|mimes:pdf',
    ]);
    
    $file1=request()->bukti1;
    $filename1=request()->name.'.'.$file1->extension();
    $file1->move(public_path('Bukti_Transfers'),$filename1);
    
    $file2=request()->bukti2;
    $filename2=request()->name.'.'.$file2->extension();
    $file2->move(public_path('Bukti_Sertifikat'),$filename2);
    
   $file3=request()->bukti3;
    $filename3=request()->name.'.'.$file3->extension();
    $file3->move(public_path('Bukti_SuratRekomendasi'),$filename3);
    Sig::create([
     'name'=>request ()->name,
     'email1'=>request ()->email1,
     'email2'=>request ()->email2,
     'hp'=>request ()->hp,
     'pasangan'=>request ()->pasangan,
     'asalrayon'=>request ()->asalrayon,
     'bukti1'=>$filename1,
     'bukti2'=>$filename2,
     'bukti3'=>$filename3,
    ]);
    
    return redirect('/formpendaftaranSIG');
  }



    
}
