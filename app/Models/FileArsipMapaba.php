<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileArsipMapaba extends Model
{
    protected $table='file_arsip_mapabas';
    protected $guarded=['id'];


public function time()
   {
    return $this->created_at
    ->isoformat('dddd, D MMMM Y').' , '.$this->created_at
    ->translatedformat('h:i');
   }

   public function timeupdate()
   {
    return $this->updated_at
    ->isoformat('dddd, D MMMM Y').' , '.$this->updated_at
    ->translatedformat('h:i');
   }

   }
