<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen_Matakuliah extends Model
{
    //
    protected $table = 'dosen_matakuliah';
	protected $fillable=['dosen_id','matakuliah_id'];

	public function dosen(){
		return $this->belongsTo(Dosen::class);
	}

    public function jadwal_matakuliah(){
        return $this->hasMany(jadwal_matakuliah::class);
    }

	public function matakuliah(){
		return $this->belongsTo(Matakuliah::class);
	}
	public function listDosenDanMatakuliah(){
        $out = [];
        foreach ($this->all() as $dosen) {
            $out [$dosen->id] = "{$dosen->dosen->nama} (Matakuliah {$dosen->matakuliah->title})";
        }
        return $out;
    }

    public function getNamadosenAttribute(){
        return $this->dosen->nama;
    }

    public function getNimdosenAttribute(){
        return $this->dosen->nim;
    }
    public function getTitleMatakuliahAttribute(){
        return $this->dosen->title;
    }
}

