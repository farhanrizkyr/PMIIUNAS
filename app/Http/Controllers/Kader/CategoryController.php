<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function __construct()
{
   $this->middleware('auth:kader');
}
 
    public function index()
    {

      $categories=Category::orderby('created_at','desc')->get();
       if(Auth::user()->status=='active'){
      return view('Category/category',compact('categories'));
      }

      if(Auth::user()->status=='disable'){
      return view('UserKader/anc');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        request()->validate([
         'name'=>'required|unique:categories',
        ],
        [
         'name.required'=>'Category Wajib Di isi',
         'name.unique'=>'Category sudah ada',
        ]);
        
        Category::create([
          'name'=>request()->name,
          'slug'=>str::slug(request()->name),
          ]);
        return redirect('/kader/category')->with('pesan','Category Berhasil di Tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
         if(Auth::user()->status=='active'){
      return view('Category/add');
      }

      if(Auth::user()->status=='disable'){
      return view('UserKader/anc');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $category=Category::find($id);

      if ($category==false) {
         return view('UserKader/404');
      }

      if (Auth::user()->status=='active') {
       return view('Category/edit',compact('category'));
      }

        if (Auth::user()->status=='disable') {
       return view('UserKader/anc');
      }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update($id)
        {
        request()->validate([
         'name'=>'required|unique:categories',
        ],
        [
         'name.required'=>'Category Wajib Di isi',
         'name.unique'=>'Category sudah ada',
        ]);
        
        Category::find($id)->update([
          'name'=>request()->name,
          'slug'=>str::slug(request()->name),
          ]);
        return redirect('/kader/category')->with('ubah','Category Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect('/kader/category')->with('hapus','Category Berhasil di hapus');
        
    }
}
