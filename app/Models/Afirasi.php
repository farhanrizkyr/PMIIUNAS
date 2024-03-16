<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afirasi extends Model
{
   protected $guarded=['id'];
   public function afirasi()
   {
        return $this->BelongsTo(Kader::class);
   }


   public function time()
   {
      return $this->created_at->isoformat('dddd, D MMMM Y').'  '.$this->created_at->translatedformat('h:i');
   }
}
