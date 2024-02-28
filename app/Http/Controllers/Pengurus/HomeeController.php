<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mrc;
use App\Models\Mapaba;
use App\Models\Slider;
use App\Models\Sig;
use App\Models\User;
class HomeeController extends Controller
{
   
    public function __construct() 
    {
      $this->middleware('auth');
    }

    public function grafik()
    {
       return view ('Home/grafik');
    }
    public function home ()
    {
      $m=DB::table('mrc')->count();
      $p=DB::table('progdis')->count();
      $i=DB::table('sigs')->count();
      $a=DB::table('pemberitahuan')->count();
      $s=DB::table('sliders')->count();
      $u=DB::table('users')->count();
      $ma=Mapaba::where('archive','not')->count();
       $ap=Mapaba::where('archive','approve')->count();
      $k=DB::table('kaders')->count();
      return view ('Home/home',compact('m','ma','s','i','p','a','u','k','ap'));
    }
}
