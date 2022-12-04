@extends('kp.layout')

@section('content')

<p>Cari Data:</p>
<div class="pb-3">
    <form class="d-flex" action="{{ url('/') }}" method="get">
        <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
        <button class="btn btn-secondary" type="submit">Cari</button>
    </form>
</div>

<h4 class="mt-5">Data kp</h4>

<a href="{{ route('kp.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<a href="{{ route('kp.restore') }}" type="button" class="btn btn-success rounded-3">Restore Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID KP</th>
        <th>Nilai</th>
        <th>NIM</th>
        <th>Judul</th>
        <th>Waktu mulai</th>
        <th>Action</th>
      </tr>
    </thead>


    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_kp }}</td>
                <td>{{ $data->nilai }}</td>
                <td>{{ $data->nim }}</td>
                <td>{{ $data->judul_kp }}</td>
                <td>{{ $data->waktu_mulai }}</td>
                <td>
                    <a href="{{ route('kp.edit', $data->id_kp) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_kp }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_kp }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('kp.delete', $data->id_kp) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus {{ $data->judul_kp}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#softhapusModal{{ $data->id_kp }}">
                        Hapus tapi yang halus
                    </button>
                    
                    <div class="modal fade" id="softhapusModal{{ $data->id_kp }}" tabindex="-1" aria-labelledby="softhapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="softhapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('kp.softDelete', $data->id_kp) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus {{ $data->judul_kp}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h4 class="mt-5">Data Mahasiswa</h4>

<a href="{{ route('mahasiswa.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Nama Mahasiswa</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>Semester</th>
        <th>ID KP</th>
        <th>Action</th>
      </tr>
    </thead>


    <tbody>
        @foreach ($Mahasiswa as $mahasiswa)
            <tr>
                <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->jurusan }}</td>
                <td>{{ $mahasiswa->semester }}</td>
                <td>{{ $mahasiswa->id_kp }}</td>
                <td>
                    <a href="{{ route('mahasiswa.edit', $mahasiswa->nim) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal2{{ $mahasiswa->nim }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal2{{ $mahasiswa->nim }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('mahasiswa.delete', $mahasiswa->nim) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus {{ $mahasiswa->nama_mahasiswa}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h4 class="mt-5">Data Tempat Magang</h4>

<a href="{{ route('tempatkp.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Perusahaan</th>
        <th>Nama Perusahaan</th>
        <th>Alamat</th>
        <th>Website</th>
        <th>ID KP</th>
        <th>Action</th>
      </tr>
    </thead>


    <tbody>
        @foreach ($Tempatkp as $tempatkp)
            <tr>
                <td>{{ $tempatkp->id_tempatkp }}</td>
                <td>{{ $tempatkp->nama_perusahaan }}</td>
                <td>{{ $tempatkp->alamat }}</td>
                <td>{{ $tempatkp->website }}</td>
                <td>{{ $tempatkp->id_kp }}</td>
                <td>
                    <a href="{{ route('tempatkp.edit', $tempatkp->id_tempatkp) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal3{{ $tempatkp->id_tempatkp }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal3{{ $tempatkp->id_tempatkp }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('tempatkp.delete', $tempatkp->id_tempatkp) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus id {{ $tempatkp->nama_perusahaan}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h4 class="mt-5">Tabel List Magang</h4>
<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Nama Mahasiswa</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>Judul KP</th>
        <th>Nama Perusahaan</th>
        <th>Nilai</th>
      </tr>
    </thead>
<tbody>
    @foreach ($joins as $join)
        <tr>
            <td>{{ $join->nama_mahasiswa }}</td>
            <td>{{ $join->nim }}</td>
            <td>{{ $join->jurusan }}</td>
            <td>{{ $join->judul_kp }}</td>
            <td>{{ $join->nama_perusahaan }}</td>
            <td>{{ $join->nilai }}</td>
    @endforeach
</tbody>
</table>

@stop
