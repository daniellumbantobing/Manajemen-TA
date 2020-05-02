<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
     protected $table = 'prodi';
     protected $fillable = ['id', 'nama_prodi']; 

public function siswa()
	{
		return $this->hasOne('App\Siswa');
	}

}
