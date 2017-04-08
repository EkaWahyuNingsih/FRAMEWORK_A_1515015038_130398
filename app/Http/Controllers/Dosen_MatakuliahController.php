<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Dosen_Matakuliah;
use App\Matakuliah;
use App\Dosen;

class Dosen_MatakuliahController extends Controller
{
     public function awal(){
       $semuadosenmatakuliah = Dosen_Matakuliah::all();
       return view('dosen_matakuliah.awal', compact('semuadosenmatakuliah'));

    //return "Hello dari dosen_matakuliahcontroller";
    }
    public function tambah()
    {      
        $dosen = new Dosen;
        $matakuliah = new Matakuliah;
        return view('dosen_matakuliah.tambah',compact('dosen','matakuliah'));
       
    }


    public function simpan(Request $input){
        $dosen_matakuliah = new Dosen_Matakuliah($input->only('dosen_id','matakuliah_id'));
        if($dosen_matakuliah->save()) $this->informasi = "Matakuliah dan Dosen Mengajar berhasil disimpan";
        return redirect('dosen_matakuliah')->with(['informasi'=>$this->informasi]);
        //$dosen_matakuliah= new dosen_matakuliah();
        //$dosen_matakuliah->dossen_id  = '1';
        //$dosen_matakuliah->matakuliah_id  = '1';
        //$dosen_matakuliah->save();
    //return "data dengan id dosen {$dosen_matakuliah->dossen_id} yang mengajar matakuliah dengan id {$dosen_matakuliah->id} telah disimpan";
    }

    public function lihat($id){
        $dosen_matakuliah = Dosen_Matakuliah::find($id);
        return view('dosen_matakuliah.lihat', compact('dosen_matakuliah'));
    }

    public function edit($id){
        $dosen_matakuliah = Dosen_matakuliah::find($id);
        $dosen = new Dosen;
        $matakuliah = new Matakuliah;
        return view('dosen_matakuliah.edit',compact('dosen','matakuliah','dosen_matakuliah'));
    }

    public function update($id,Request $input)
    {
        $dosen_matakuliah = Dosen_Matakuliah::find($id);
        $dosen_matakuliah->fill($input->only('dosen_id','matakuliah_id'));
        if($dosen_matakuliah->save()) $this->informasi = "Matakuliah dan Dosen Mengajar berhasil diperbarui";
        return redirect('dosen_matakuliah')->with(['informasi'=>$this->informasi]);
    }

    public function hapus($id,Request $input)
    {
        $dosen_matakuliah = Dosen_Matakuliah::find($id);
        if($dosen_matakuliah->delete()) $this->informasi = "Matakuliah dan Mahasiswa berhasil dihapus";
        return redirect('dosen_matakuliah')-> with(['informasi'=>$this->informasi]);
    }
}
