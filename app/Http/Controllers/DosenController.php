<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dosen;

class DosenController extends Controller
{
    //
     public function awal()
	{
	return "Daftar Dosen";
	}
	  public function tambah()
	{
    	return $this->simpan();
    }
    public function simpan()
    {
    	$dosen = new Dosen();
    	$dosen->nama = 'jon_doe';
    	$dosen->nim = '123456789';
    	$dosen->alamat = 'mugirejo';
    	$dosen->pengguna_id = '1';
    	$dosen->save();
    	return "data dengan username {$dosen->nama}  telah disimpan";
    }
}
