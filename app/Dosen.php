<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    //

    protected $table='dosen';
    protected $fillable=['nama','nim','alamat','pengguna_id'];

		public function pengguna(){
			return $this->belongsTo(Pengguna::class);
		}

		public function dosen_matakuliah(){
			 return $this->hasMany(Dosen_Matakuliah::class);
		
		}
}
