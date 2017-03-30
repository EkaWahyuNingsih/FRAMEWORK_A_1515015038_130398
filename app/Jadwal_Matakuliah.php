<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal_Matakuliah extends Model
{
    //
    protected $table = 'jadwal_matakuliah';
	protected $fillable=['mahasiswa_id','ruangan_id','dosen_matakuliah'];

	public function mahasiswa(){
		return $this->belongsTo(Mahasiswa::class);
	}

	public function ruangan(){
		return $this->hasMany(Ruangan::class);
	}
}
