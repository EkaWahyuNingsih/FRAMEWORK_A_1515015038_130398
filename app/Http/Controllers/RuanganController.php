<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ruangan;

class RuanganController extends Controller
{
	public function awal()
	{
	return "Ini Ruangan Controller";
	}
	  public function tambah()
	{
    	return $this->simpan();
    }
    public function simpan()
    {
    	$ruangan = new Ruangan();
    	$ruangan->title = '406';
    	$ruangan->save();
    	return "data dengan username {$ruangan->title} telah disimpan";
    }
    //
}
