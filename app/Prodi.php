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
public function matakuliah()
	{
		return $this->hasMany(Matakuliah::class);
	}

	public function dosen()
	{
		return $this->hasOne('App\Dosen');
	}

}
