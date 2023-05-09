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
       return $this->hasMany(Mapaba::class);
     }

      public function progdiis()
     {
       return $this->hasMany(Pengurus::class);
     }
}
