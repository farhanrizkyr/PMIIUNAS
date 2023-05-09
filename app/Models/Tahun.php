<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    protected $table='tahuns';
    protected $guarded=['id'];
    public function tahuns()
     {
       return $this->hasMany(Mapaba::class);
     }

      public function tahunns()
     {
       return $this->hasMany(Pengurus::class);
     }
}
