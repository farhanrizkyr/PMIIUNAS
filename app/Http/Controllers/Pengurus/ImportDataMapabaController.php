<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mapaba;
class ImportDataMapabaController extends Controller
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
        $data=Mapaba::orderby('name','desc')->where('archive','approve')->get();
        return view ('ImportDataMapaba/index',compact('data'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImportDataMapaba  $importDataMapaba
     * @return \Illuminate\Http\Response
     */
    public function show(ImportDataMapaba $importDataMapaba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImportDataMapaba  $importDataMapaba
     * @return \Illuminate\Http\Response
     */
    public function edit(ImportDataMapaba $importDataMapaba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImportDataMapaba  $importDataMapaba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImportDataMapaba $importDataMapaba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImportDataMapaba  $importDataMapaba
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImportDataMapaba $importDataMapaba)
    {
        //
    }
}

