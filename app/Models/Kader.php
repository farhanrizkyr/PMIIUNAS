<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
class Kader extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * 
     * 
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded =['id'];
     protected $guard = 'kader';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function avatar()
    {
        if (!$this->avatar) {
            return asset('AvatarKader/avatar.png');
        }
         return asset('AvatarKader/'.$this->avatar);
    }

   public function posts()
   {
      return $this->hasMany(Post::class)->orderBy('created_at', 'desc');
   }

   public function afirasis()
   {
        return $this->hasMany(Afirasi::class);
   }


   public function ubahstatus($id,$data)
   {
       return DB::table('kaders')
       ->where('id',$id)
       ->update($data);
   }
}
