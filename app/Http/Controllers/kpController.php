<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use App\Models\kp;
use App\Models\mahasiswa;
use App\Models\tempatkp;

class kpController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request) {
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $datas = DB::table('kp')
                ->where('judul_kp', 'like', "%$katakunci%")
                ->orWhere('nim', 'like', "%$katakunci%")
                ->orWhere('waktu_mulai', 'like', "%$katakunci%")
                ->paginate(5);
        } else {
            $datas = DB::select('select * from kp where is_deleted=0');
        }
        if (strlen($katakunci)) {
            $Mahasiswa = DB::table('mahasiswa')
                ->where('nama_mahasiswa', 'like', "%$katakunci%")
                ->orWhere('jurusan', 'like', "%$katakunci%")
                ->orWhere('semester', 'like', "%$katakunci%")
                ->paginate(3);
        } else {
            $Mahasiswa = DB::select('select * from mahasiswa where is_deleted=0');
        }
        if (strlen($katakunci)) {
            $Tempatkp = DB::table('tempat_kp')
                ->where('nama_perusahaan', 'like', "%$katakunci%")
                ->orWhere('website', 'like', "%$katakunci%")
                ->paginate(3);
        } else {
            $Tempatkp = DB::select('select * from tempat_kp');
        }

        $joins = DB::table('kp')
            ->join('mahasiswa', 'kp.id_kp', '=', 'mahasiswa.id_kp')
            ->join('tempat_kp','kp.id_kp','=','tempat_kp.id_kp')
            ->select('mahasiswa.*', 'tempat_kp.*', 'kp.judul_kp', 'kp.nilai')
            ->where('kp.is_deleted', '0')
            ->get();

        return view('kp.index')
            ->with('datas', $datas)
            ->with('Mahasiswa', $Mahasiswa)
            ->with('Tempatkp', $Tempatkp)
            ->with('joins',$joins);
    }

    public function create() {
        return view('kp.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_kp' => 'required',
            'nilai' => 'required',
            'nim' => 'required',
            'judul_kp' => 'required',
            'waktu_mulai' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO kp(id_kp, nilai, nim, judul_kp, waktu_mulai) VALUES (:id_kp, :nilai, :nim, :judul_kp, :waktu_mulai)',
        [
            'id_kp' => $request->id_kp,
            'nilai' => $request->nilai,
            'nim' => $request->nim,
            'judul_kp' => $request->judul_kp, 
            'waktu_mulai' => $request->waktu_mulai,
        ]
        );

        return redirect()->route('kp.index')->with('success', 'Data kp berhasil disimpan');
    }
    public function edit($id) {
        $data = DB::table('kp')->where('id_kp', $id)->first();

        return view('kp.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_kp' => 'required',
            'nilai' => 'required',
            'nim' => 'required',
            'judul_kp' => 'required',
            'waktu_mulai' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE kp SET id_kp = :id_kp, nilai = :nilai, nim = :nim, judul_kp = :judul_kp, waktu_mulai = :waktu_mulai WHERE id_kp = :id',
        [
            'id' => $id,
            'id_kp' => $request->id_kp,
            'nilai' => $request->nilai,
            'nim' => $request->nim,
            'judul_kp' => $request->judul_kp, 
            'waktu_mulai' => $request->waktu_mulai,
        ]
        );

        return redirect()->route('kp.index')->with('success', 'Data kp berhasil diubah');
    }
    public function delete($id) {
        DB::delete('DELETE FROM kp WHERE id_kp = :id_kp', ['id_kp' => $id]);
        return redirect()->route('kp.index')->with('success', 'Data kp berhasil dihapus');
    }

    public function softDelete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE kp SET is_deleted = 1
        WHERE id_kp = :id_kp', ['id_kp' => $id]);
        return redirect()->route('kp.index')->with('success', 'Data kp berhasil dihapus');
    }

    public function restore()
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::table('kp')
        ->update(['is_deleted' => 0]);
        return redirect()->route('kp.index')->with('success', 'Data kp berhasil direstore');
    }

}
