<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemberitahuan extends Model
{
    protected $table='pemberitahuan';
    protected $guarded=['id'];


    public function gambar()
    {
        if (!$this->gambar) {
            return asset('PosterPem/noimage.png');
        }
         return asset('PosterPem/'.$this->gambar);
    }

}
