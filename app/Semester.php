<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semester';
       public function matakuliah()
	{
		return $this->hasMany(Matakuliah::class);
	}
}
