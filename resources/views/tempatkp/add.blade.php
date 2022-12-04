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

            <h5 class="card-title fw-bolder mb-3">Tambah Tempat Magang</h5>

            <form method="post" action="{{ route('tempatkp.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id_tempatkp" class="form-label">id Tempat Magang</label>
                    <input type="text" class="form-control" id="id_tempatkp" name="id_tempatkp">
                </div>
                <div class="mb-3">
                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input type="text" class="form-control" id="website" name="website">
                </div>
                <div class="mb-3">
                  <label for="id_kp" class="form-label">ID KP</label>
                  <input type="text" class="form-control" id="id_kp" name="id_kp">
              </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
    </div>

@stop