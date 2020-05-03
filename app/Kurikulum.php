<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
     protected $table = 'kurikulum';

    public function matakuliah()
	{
		return $this->hasMany(Matakuliah::class);
	}
}
