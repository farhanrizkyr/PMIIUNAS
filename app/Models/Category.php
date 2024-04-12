<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table='categories';
   protected $guarded=['id'];
   
   public function categories()
   {
     return $this->hasMany(Post::class)->orderBy('created_at', 'desc');
   }


  
}
