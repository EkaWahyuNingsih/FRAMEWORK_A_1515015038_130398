<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    //
     public function awal()
	{
	return "Daftar Mahasiswa";
	}
	  public function tambah()
	{
    	return $this->simpan();
    }
    public function simpan()
    {
    	$mahasiswa = new Mahasiswa();
    	$mahasiswa->nama = 'eka';
    	$mahasiswa->nim = '1515015038';
    	$mahasiswa->alamat = 'lantung';
    	$mahasiswa->pengguna_id = '2';
    	$mahasiswa->save();
    	return "data dengan username {$mahasiswa->nama}  telah disimpan";
    }
}
