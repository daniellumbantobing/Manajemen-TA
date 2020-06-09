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
            return $this->belongsToMany(Matakuliah::class)->withPivot(['nilai','nilai1','nilai2','nilaiakhir'])->withtimestamps();
        }

        public function rataratanilai()
        {
            // ambil nilai
            //$this memanggil objek sisawa yang dibentuk mengaju pada kelas siswa 
            $total = 0;
            $total1 = 0;
            $total2 = 0;
            $hitung = 0;
            foreach ($this->matakuliah as $mapel) {
                $total += $mapel->pivot->nilai;
                $total1 += $mapel->pivot->nilai1;
                $total2 += $mapel->pivot->nilai2;
                
                $hitung++;
                
            }
           
              if ($hitung == 0){
                 return 0;
             }
             
            $hasil1 = $total * 30/100;
            $hasil2 = $total1 * 10/100;
            $hasil3 = $total2 * 60/100;

            $hasil = $hasil1 + $hasil2 + $hasil3;
 

            if ((79.5 <= $hasil) && ($hasil1 < 100)) {
            return 'A';
            }
            elseif ((72 <= $hasil) && ($hasil1 < 79.5)) {
                return 'AB';
            } 
            elseif ((64.5 <= $hasil) && ($hasil1 < 72.5)) {
                return 'B';
            }
             elseif ((57 <= $hasil) && ($hasil1 < 65.5)) {
                return 'BC';
            }
             elseif ((49.5 <= $hasil) && ($hasil1 < 57)) {
                return 'C';
            }
             elseif ((34 <= $hasil) && ($hasil1 < 49.5)) {
                return 'D';
            }
             elseif ((0 <= $hasil) && ($hasil1 < 34)) {
                return 'E';
            }

             return $hasil;



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
