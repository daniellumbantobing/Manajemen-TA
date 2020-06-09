<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
	protected $table = 'kelompok';
   protected $fillable = ['noKel','judul','idMhs','namaMhs'];

   public function users(){
   	return $this ->belongsTo(User::class);
   }
}
