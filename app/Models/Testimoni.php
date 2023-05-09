<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table='testimonis';
   protected $guarded=['id'];


   public function gambar()
   {
    if (!$this->gambar) {
        return asset('FotoTestimoniKader/avatar.png');
    }
    return asset('FotoTestimoniKader'.$this->gambar);
   }
}
