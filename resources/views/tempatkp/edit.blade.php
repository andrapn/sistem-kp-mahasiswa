@extends('kp.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data tempat</h5>

		<form method="post" action="{{ route('tempatkp.update', $data->id_tempatkp) }}">
			@csrf
            <div class="mb-3">
                <label for="id_tempatkp" class="form-label">id tempat kp Mahasiswa</label>
                <input type="text" class="form-control" id="id_tempatkp" name="id_tempatkp" value="{{ $data->id_tempatkp }}">
            </div>
			<div class="mb-3">
                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ $data->nama_perusahaan }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}">
            </div>
            <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="text" class="form-control" id="website" name="website" value="{{ $data->website }}">
            </div>
            <div class="mb-3">
              <label for="id_kp" class="form-label">ID KP</label>
              <input type="text" class="form-control" id="id_kp" name="id_kp" value="{{ $data->id_kp }}">
          </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop