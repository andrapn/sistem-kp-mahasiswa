<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\kp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class mahasiswaController extends Controller
{
    public function index() {
        $datas = DB::select('select * from mahasiswa');

        return view('kp.index')
            ->with('datas', $datas);
    }

    public function create() {
        $kp = Kp::all();
        return view('mahasiswa.add',compact('kp'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_mahasiswa' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
            'semester' => 'required', 
            'id_kp' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO mahasiswa(nama_mahasiswa, nim, jurusan,semester,id_kp ) VALUES (:nama_mahasiswa, :nim, :jurusan, :semester, :id_kp)',
        [
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'semester' => $request->semester,
            'id_kp' => $request->id_kp,
        ]
        );
        
        return redirect()->route('kp.index')->with('success', 'Data mahasiswa berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('mahasiswa')->where('nim', $id)->first();
        $kp = Kp::all();
        return view('mahasiswa.edit')->with('data', $data,compact('kp'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'nama_mahasiswa' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
            'semester' => 'required', 
            'id_kp' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE mahasiswa SET nim = :nim, nama_mahasiswa = :nama_mahasiswa, jurusan = :jurusan, semester = :semester, id_kp = :id_kp WHERE nim = :id',
        [
            'id' => $id,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'semester' => $request->semester,
            'id_kp' => $request->id_kp,
        ]
        );

        // Menggunakan laravel eloquent
        // departement::where('id_departement', $id)->update([
        //     'id_departement' => $request->id_departement,
        //     'nama_departement' => $request->nama_departement,
        //     'alamat' => $request->alamat,
        //     'no_telfon' => $request->no_telfon,
        //     'jenis_kelamin' => Hash::make($request->jenis_kelamin),
        // ]);

        return redirect()->route('kp.index')->with('success', 'Data mahasiswa berhasil diubah');
    }

    public function delete($nim) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM mahasiswa WHERE nim = :nim', ['nim' => $nim]);

        // Menggunakan laravel eloquent
        // Ikan::where('id_produsen', $id)->delete();

        return redirect()->route('kp.index')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}