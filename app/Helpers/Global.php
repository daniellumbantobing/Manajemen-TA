<?php
use App\Siswa;
use App\Dosen;
use App\Matakuliah;
function ranking5Besar()
{
	$siswa = Siswa::all();
    	$siswa->map(function($s){
    		$s->rataratanilai = $s->rataratanilai();
    		return $s; 
    	});
    	
    $siswa = $siswa->sortByDesc('rataratanilai')->take(5);
    return $siswa;
   
}

function totalsiswa()
{
	return Siswa::count();
}

function totalguru()
{
	return Dosen::count();

}

function totalmatakuliah(){
 
   return Matakuliah::count();
}