<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $table = 'document';

    protected $guarded = ['id'];

    
    public function user(){
    return $this->belongsTo(User::class);
    } 
}
