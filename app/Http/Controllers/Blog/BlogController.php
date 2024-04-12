<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Kader;
use App\Models\Category;
class BlogController extends Controller
{
   
  public function blog()
  {
     $posts=Post::latest()->paginate(9);
   return view('Dashboard/Blog/blog',compact('posts'));
  }

  public function author(Kader $kader)
  { 
   
   $data=$kader->posts()->paginate(9);
   return view('Dashboard.Blog.author',compact('data','kader'));


  }

   public function category(Category $category)
  { 
   
   $data=$category->categories()->paginate(9);
   return view('Dashboard.Blog.category',compact('data','category'));


  }
}
