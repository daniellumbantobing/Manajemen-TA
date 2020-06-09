<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
      protected $table = 'dosen';
      
      protected $guarded = ['id'];
      
       public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    } 
       public function user()
    {
        return $this->belongsTo(User::class);
    } 
  
}
