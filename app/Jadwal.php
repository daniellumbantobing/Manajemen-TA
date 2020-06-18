<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
protected $table = 'jadwal';
   protected $fillable = ['kelompok','tanggal','waktu','des','tempat','status1','status2','user_id'];

  public function user(){
    return $this->belongsTo(User::class);
    } 
}
