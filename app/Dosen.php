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
		 public function getUsernameAttribute(){
    	return $this->pengguna->username;
    }
    public function listDosenDanNip(){
        $out = [];
        foreach ($this->all() as $dsn) {
            $out [$dsn->id] = "{$dsn->nama} ({$dsn->nim})";
            # code...
        }
        return $out;
    }

     public function listDosenDanMatakuliah(){
        $out = [];
        foreach ($this->all() as $dmk) {
            $out [$dmk->id] = "{$dmk->dosen->nama} ({$dmk->nim} {$dmk->matakuliah->title})";
            # code...
        }
        return $out;
    }
}
