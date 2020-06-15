<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
	protected $table = 'kelompok';
   protected $fillable = ['noKel','judul','idMhs','namaMhs','pembingbing','penguji','des','namaMhs1','namaMhs2'];

   public function users(){
   	return $this ->belongsTo(User::class);
   }
}
