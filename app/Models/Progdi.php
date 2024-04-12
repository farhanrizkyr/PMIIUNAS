<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progdi extends Model
{
     protected $table='progdis';
     protected $guarded=['id'];
     public function progdis()
     {
       return $this->hasMany(Mapaba::class)->orderby('created_at','desc')->where('archive','approve');
     }

      public function progdiis()
     {
       return $this->hasMany(Pengurus::class);
     }
}
