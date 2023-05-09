<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SejarahPMII;
class SejarahPMIIController extends Controller
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
        $data=sejarahPMII::all();
       return view('sejarahPMII/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SejarahPMII  $sejarahPMII
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $sejarah=SejarahPMII::find($id);
       return view('SejarahPMII/more',compact('sejarah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SejarahPMII  $sejarahPMII
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sejarah=SejarahPMII::find($id);
        if ($sejarah==false) {
            return view('Home/404');
        }
        return view('SejarahPMII/edit',compact('sejarah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SejarahPMII  $sejarahPMII
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
       
        request()->validate([
         'judul'=>'required',
         'profile'=>'required',
        ],
    [
    'judul.required'=>'Wajib Diisi',
    'profile.required'=>'Wajib Diisi'

    ]);

    SejarahPMII::find($id)->update(request()->all());
    return redirect('/profpmiiunas')->with('pesan','Sejarah Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SejarahPMII  $sejarahPMII
     * @return \Illuminate\Http\Response
     */
    public function destroy(SejarahPMII $sejarahPMII)
    {
        //
    }
}
