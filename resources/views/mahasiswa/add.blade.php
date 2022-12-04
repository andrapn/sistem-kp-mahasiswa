@extends('kp.layout')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-body">

            <h5 class="card-title fw-bolder mb-3">Tambah Produsen</h5>

            <form method="post" action="{{ route('mahasiswa.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nama_mahasiswa" class="form-label">Nama Mhs</label>
                    <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa">
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">Nim</label>
                    <input type="text" class="form-control" id="nim" name="nim">
                </div>
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan">
                </div>
                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <input type="text" class="form-control" id="semester" name="semester">
                </div>
                <div class="mb-3">
                  <label for="id_kp" class="form-label">id kp</label>
                  <input type="text" class="form-control" id="id_kp" name="id_kp">
              </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
    </div>

@stop