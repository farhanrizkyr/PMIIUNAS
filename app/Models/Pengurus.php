<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
   protected $guarded=['id'];

    public function progdi()
     {
     return $this->BelongsTo(Progdi::class);
     }
     public function tahun()
     {
     return $this->BelongsTo(Tahun::class);
     }

}
