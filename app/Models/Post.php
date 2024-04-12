<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    protected $guarded=['id'];
  
    public function category()
   {
   return $this->BelongsTo(Category::class);
   }

   public function post()
   {
      return $this->BelongsTo(Kader::class,'kader_id');
   }


   public function image()
   {
     if (!$this->image) {
       return asset('Posts/noimage.png');
     }
      return asset('Posts/'.$this->image);
   }

  
}
