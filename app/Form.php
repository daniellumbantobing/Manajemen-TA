<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
protected $table = 'form_maju';
   protected $fillable = ['noKel','judul','status','user_id'];

 public function user(){
    return $this->belongsTo(User::class);
    } 
}
