<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $fillable = ['kode_matku','matakuliah','sks','prodi_id','semester_id','kurikulum_id'];
    protected $table = 'matakuliah';


    public function prodi (){
    	return $this->belongsTo(Prodi::class);
    }



     public function semester (){
    	return $this->belongsTo(Semester::class);
    }


    public function kurikulum (){
    	return $this->belongsTo(Kurikulum::class);
    }


    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['nilai']);
    }
    public function guru()
    {
        return $this->belongsTo('App\Guru');
    }
}
