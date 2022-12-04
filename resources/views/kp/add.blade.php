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

            <h5 class="card-title fw-bolder mb-3">Tambah data kp</h5>

            <form method="post" action="{{ route('kp.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id_kp" class="form-label">ID kp</label>
                    <input type="text" class="form-control" id="id_kp" name="id_kp">
                </div>
                <div class="mb-3">
                    <label for="nilai" class="form-label">nilai kp</label>
                    <input type="text" class="form-control" id="nilai" name="nilai">
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">nim</label>
                    <input type="text" class="form-control" id="nim" name="nim">
                </div>
                <div class="mb-3">
                    <label for="judul" class="form-label">judul kp</label>
                    <input type="text" class="form-control" id="judul_kp" name="judul_kp">
                </div>
                <div class="mb-3">
                  <label for="waktu_mulai" class="form-label">waktu mulai kp</label>
                  <input type="text" class="form-control" id="waktu_mulai" name="waktu_mulai">
              </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
    </div>

@stop