<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\ProfilePMIIUNAS;
use Illuminate\Http\Request;

class ProfilePMIIUNASController extends Controller
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
        $data=ProfilePMIIUNAS::all();
        return view('ProfilePMIIUNAS/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfilePMIIUNAS  $profilePMIIUNAS
     * @return \Illuminate\Http\Response
     */
    public function show(ProfilePMIIUNAS $profilePMIIUNAS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfilePMIIUNAS  $profilePMIIUNAS
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alamat=ProfilePMIIUNAS::find($id);
        if ($alamat==null) {
            return view('Home/404');
        }
        return view('ProfilePMIIUNAS/edit',compact('alamat'));
    }

     public function more($id)
    {
        $alamat=ProfilePMIIUNAS::find($id);
        if ($alamat==null) {
            return view('Home/404');
        }
        return view('ProfilePMIIUNAS/more',compact('alamat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfilePMIIUNAS  $profilePMIIUNAS
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

    ProfilePMIIUNAS::find($id)->update(request()->all());
    return redirect('/profpmiiunas')->with('pesan','Profile Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfilePMIIUNAS  $profilePMIIUNAS
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilePMIIUNAS $profilePMIIUNAS)
    {
        //
    }
}