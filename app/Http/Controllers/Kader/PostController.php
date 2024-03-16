<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
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
        $categories=Category::latest()->get();
        $kader_id=Auth::user()->id;
      $posts=Post::orderby('created_at','desc')->where('kader_id',auth()->user()->id)->get();
      
       return view('Posts/post',compact('posts','categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
  {
    request()->validate([
     'name'=>'required|unique:posts',
     'category_id'=>'required',
     'image'=>'mimes:jpg,png,jpeg|max:2048',
     'body'=>'required',
    ],
    [
    'name.required'=>'Wajib Di isi',
    'name.unique'=>'Judul Artikel Sudah ada',
    'category_id.required'=>'Wajib Di isi',
    'image.required'=>'Gambar Wajib isi',
    'image.mimes'=>'Gambar Wajib JPG,PNG,JPEG',
    'image.max'=>'Ukuran Gambar Harus 2MB',
    'body.required'=>'Wajib Di isi',
    ]);
    
 
      if (request()->image <> '') {
     $file=request ()->file('image');
    $filename=time().'.'.$file->getClientOriginalExtension();
    $file->move(public_path('Posts'),$filename);
    
    
    Post::create([
     'name'=>request()->name,
     'kader_id'=>Auth::user()->id,
     'slug'=>str::slug(request ()->name),
     'body'=>request()->body,
    'category_id'=>request()->category_id,
    'image'=>$filename,
      ]);
      } else {
          Post::create([
     'name'=>request()->name,
     'kader_id'=>Auth::user()->id,
     'slug'=>str::slug(request ()->name),
     'body'=>request()->body,
    'category_id'=>request()->category_id,

      ]);
      }
      
      return redirect('/kader/artikel')->with('pesan','Post Berhasil di Tambah');
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
     $post=Post::where('slug',$slug)->first ();
     if ($post==false) {
       return view ('Posts/404');
     }

      if ($post->status=='draft') {
         return view('UserKader/draft',compact('post'));
    
    }
     return view ('Posts/more',compact('post'));

  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post=Post::where('slug',$slug)->first();
        $categories=Category::orderby('created_at','desc')->get();
          if ($post==false) {
         return view('UserKader/404');
      }
       return view ('Posts/edit',compact('post','categories'));
        
    }

    public function create()
    {
      $categories=Category::orderby('created_at','desc')->get();
       if (Auth::user()->status=='active') {
        return view ('Posts/add',compact('categories'));

      }

         if (Auth::user()->status=='disable') {
        return view ('UserKader/anc');
    }

  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($id)
     {
    request()->validate([
     'name'=>'required',
     'category_id'=>'required',
     'image'=>'mimes:jpg,png,jpeg|max:2048',
     'body'=>'required',
    ],
    [
    'name.required'=>'Wajib Di isi',
    'name.unique'=>'Judul Artikel Sudah ada',
    'category_id.required'=>'Wajib Di isi',
    'image.required'=>'Gambar Wajib isi',
    'image.mimes'=>'Gambar Wajib JPG,PNG,JPEG',
    'image.max'=>'Ukuran Gambar Harus 2MB',
    'body.required'=>'Wajib Di isi',
    ]);

     
    
    if (request()->hasfile('image')) {
       $gambar=request()->file('image');
      $nama_gambar=time().'.'.$gambar->getClientOriginalExtension();
      $gambar->move(public_path('Posts'),$nama_gambar);

       if (request()->gambar_lama <> '') {
      unlink(public_path('Posts').'/'.request()->gambar_lama);
    }
 
    Post::find($id)->update([
      'kader_id'=>Auth::user()->id,
     'name'=>request()->name,
     'status'=>request()->status,
     'slug'=>str::slug(request ()->name),
     'body'=>request()->body,
    'category_id'=>request()->category_id,
    'image'=>$nama_gambar,
      ]);
  
    }

    



  

     else {
     Post::find($id)->update([
     'kader_id'=>Auth::user()->id,
     'name'=>request()->name,
      'status'=>request()->status,
     'slug'=>str::slug(request ()->name),
     'body'=>request()->body,
    'category_id'=>request()->category_id,
      ]);
    }
      return redirect('/kader/artikel')->with('pesan','Post Berhasil di Ubah');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
          if ($post==false) {
         return view('UserKader/404');
      }
        if ($post->image <> '') {
     unlink(public_path('Posts').'/'.$post->image);
        }
        
        $post->delete();
        return redirect('/kader/artikel')->with('hapus','Post Artikel Berhasil di Hapus');
    }

    public function all()
    {
      $all=Post::orderby('created_at','desc')->where('kader_id',auth()->user()->id)->where('status','publish')->paginate(3);
       $categories=Category::latest()->get();
     return view('Posts/allposts',compact('all','categories'));
    }

      public function store1()
  {
    request()->validate([
     'name'=>'required|unique:posts',
     'category_id'=>'required',
     'image'=>'mimes:jpg,png,jpeg|max:2048',
     'body'=>'required',
    ],
    [
    'name.required'=>'Wajib Di isi',
    'name.unique'=>'Judul Artikel Sudah ada',
    'category_id.required'=>'Wajib Di isi',
    'image.required'=>'Gambar Wajib isi',
    'image.mimes'=>'Gambar Wajib JPG,PNG,JPEG',
    'image.max'=>'Ukuran Gambar Harus 2MB',
    'body.required'=>'Wajib Di isi',
    ]);
    
 
      if (request()->image <> '') {
     $file=request ()->file('image');
    $filename=time().'.'.$file->getClientOriginalExtension();
    $file->move(public_path('Posts'),$filename);
    
    
    Post::create([
     'name'=>request()->name,
     'kader_id'=>Auth::user()->id,
     'slug'=>str::slug(request ()->name),
     'body'=>request()->body,
    'category_id'=>request()->category_id,
    'image'=>$filename,
      ]);
      } else {
          Post::create([
     'name'=>request()->name,
     'kader_id'=>Auth::user()->id,
     'slug'=>str::slug(request ()->name),
     'body'=>request()->body,
    'category_id'=>request()->category_id,

      ]);
      }
      
      return redirect('/kader/allposts');
  }

}

