<?php

namespace App\Http\Controllers;

use App\Models\tempatkp;
use App\Models\kp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class tempatkpController extends Controller
{
    public function index() {
        $datas = DB::select('select * from tempat_kp');

        return view('kp.index')
            ->with('datas', $datas);
    }

    public function create() {
        $kp = KP::all();
        return view('tempatkp.add',compact('kp'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_tempatkp' => 'required',
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'website' => 'required', 
            'id_kp' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO tempat_kp(id_tempatkp, nama_perusahaan, alamat,website,id_kp ) VALUES (:id_tempatkp, :nama_perusahaan, :alamat, :website, :id_kp)',
        [
            'id_tempatkp' => $request->id_tempatkp,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
            'website' => $request->website,
            'id_kp' => $request->id_kp,
        ]
        );

        return redirect()->route('kp.index')->with('success', 'Data tempat berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('tempat_kp')->where('id_tempatkp', $id)->first();
        $kp = Kp::all();
        return view('tempatkp.edit')->with('data', $data,compact('kp'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_tempatkp' => 'required',
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'website' => 'required', 
            'id_kp' => 'required',
        ]);

        DB::update('UPDATE tempat_kp SET id_tempatkp = :id_tempatkp, nama_perusahaan = :nama_perusahaan, alamat = :alamat, website = :website, id_kp = :id_kp WHERE id_tempatkp = :id',
        [
            'id' => $id,
            'id_tempatkp' => $request->id_tempatkp,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
            'website' => $request->website,
            'id_kp' => $request->id_kp,
        ]
        );

        return redirect()->route('kp.index')->with('success', 'Data tempat berhasil diubah');
    }

    public function delete($id_tempatkp) {
        DB::delete('DELETE FROM tempat_kp WHERE id_tempatkp = :id_tempatkp', ['id_tempatkp' => $id_tempatkp]);

        return redirect()->route('kp.index')->with('success', 'Data tempat berhasil dihapus');
    }
}