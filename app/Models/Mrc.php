<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mrc extends Model
{
    protected $table='mrc';
    protected $guarded=['id'];

     public function gambar()
    {
        if (!$this->gambar) {
            return asset('Mrc/noimage.png');
        }
         return asset('Mrc/'.$this->gambar);
    }
}
