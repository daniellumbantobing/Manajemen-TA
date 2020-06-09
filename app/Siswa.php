<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','agama','alamat','avatar','user_id','username','nim','prodi_id']; 
    public $timestamps = false;
    
    public function getAvatar()
    {
    	if(!$this->avatar){
    			return asset('images/default.jpg');
    	}
    		return asset('images/'.$this->avatar);
    }
        
    	/*public function mapel()
    	{
    		return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withtimestamps();
    	}*/
        public function matakuliah()
        {
            return $this->belongsToMany(Matakuliah::class)->withPivot(['nilai'])->withtimestamps();
        }

        public function rataratanilai()
        {
            // ambil nilai
            //$this memanggil objek sisawa yang dibentuk mengaju pada kelas siswa 
            $total = 0;
            $hitung = 0;
            foreach ($this->matakuliah as $mapel) {
                $total += $mapel->pivot->nilai;
                //$hitung = $mapel->count();
                $hitung++;
                
            }
           
              if ($hitung == 0){
                 return 0;
             }
             
            $hasil = $total/$hitung;
/*
            if ($hasil == 90) {
            return 'A';
            }*/
             return round($hasil);



        }

        public function namalengkap(){

            return $this->nama_depan.' '.$this->nama_belakang;
        }
   public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    } 

      public function user()
    {
        return $this->belongsTo(User::class);
    } 
  
}
