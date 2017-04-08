<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Jadwal_Matakuliah;
use App\Mahasiswa;
use App\Dosen_Matakuliah;
use App\Ruangan;

class Jadwal_MatakuliahController extends Controller
{
    //
    protected $informasi = 'Gagal Melakukan Aksi';
    public function awal()
    {
        $semuaJadwalMatakuliah = Jadwal_Matakuliah::all();
        return view('jadwal_matakuliah.awal',compact('semuaJadwalMatakuliah'));
    }
    public function tambah()
    {
        $jadwal_matakuliah = new Jadwal_Matakuliah;
        $mahasiswa = new Mahasiswa;
        $ruangan = new Ruangan;
        $dosen_matakuliah = new Dosen_Matakuliah;
        return view('jadwal_matakuliah.tambah', compact('mahasiswa','ruangan','dosen_matakuliah'));
    }
    
    public function simpan(Request $input){
        $jadwal_matakuliah = new Jadwal_Matakuliah($input->only('mahasiswa_id','dosen_matakuliah_id','ruangan_id'));
        if ($jadwal_matakuliah->save()) $this->informasi = "Jadwal Matakuliah berhasil disimpan";
        return redirect('jadwal_matakuliah')->with(['informasi' => $this->informasi]);

    }
    public function edit($id){
        $jadwal_matakuliah = Jadwal_Matakuliah::find($id);
        $mahasiswa = new Mahasiswa;
        $ruangan = new Ruangan;
        $dosen_matakuliah = new Dosen_Matakuliah;
        return view('jadwal_matakuliah.edit', compact('mahasiswa','ruangan','dosen_matakuliah','jadwal_matakuliah'));
    }

    public function lihat($id){
        $jadwal_matakuliah = Jadwal_Matakuliah::find($id);
        return view('jadwal_matakuliah.lihat')->with(array('jadwal_matakuliah'=> $jadwal_matakuliah));
    }

    public function update($id, Request $input){
        $jadwal_matakuliah = Jadwal_Matakuliah::find($id);
        $jadwal_matakuliah->ruangan_id = $input->ruangan_id;
        $jadwal_matakuliah->dosen_matakuliah_id = $input->dosen_matakuliah_id;
        $jadwal_matakuliah->mahasiswa_id = $input->mahasiswa_id;
        $informasi = $jadwal_matakuliah->save() ? 'Berhasil Update data' : 'Gagal Update Data';
        return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);
    }

    public function hapus($id){
        $jadwal_matakuliah = Jadwal_Matakuliah::find($id);
        $informasi = $jadwal_matakuliah->delete() ? 'Berhasil Hapus data' : 'Gagal Hapus data';
        return redirect ('jadwal_matakuliah')->with(['informasi'=>$informasi]);
    }

}
