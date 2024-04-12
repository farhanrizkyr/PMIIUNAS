<?php

namespace App\Http\Controllers\Mrc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mrc;
class MerchandiseController extends Controller
{
   
  public function merchandise()
  {
    $mrc=Mrc::latest()->paginate(9);
     return view('Dashboard/Mrc/mrc',compact('mrc'));
  }
}
