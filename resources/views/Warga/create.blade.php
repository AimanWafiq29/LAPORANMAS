@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Tambah Pengaduan</h1>
        </div>
    </div>
    <br>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Pengaduan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('pengaduanWarga.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="judul" class="col-md-2 col-form-label text-md-right">
                        Judul Pengaduan
                    </label>
                    <div class="col-md-6">
                        <input id="judul" type="text" class="form-control col-md-8 @error('judul') is-invalid @enderror" name="judul" autofocus>
                        @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kategori" class="col-md-2 col-form-label text-md-right">Kategori Pengaduan</label>
                    <div class="col-md-6">
                        <select class="form-control col-md-8 @error('kategori_id') is-invalid @enderror" id="kategori" name="kategori_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="deskripsi" class="col-md-2 col-form-label text-md-right">
                        Deskripsi Pengaduan
                    </label>
                    <div class="col-md-6">
                        <textarea class="form-control col-md-8 @error('deskripsi') is-invalid @enderror" name="deskripsi" autofocus></textarea>
                        @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <!-- ... (existing form fields) -->
                <div class="form-group row">
                    <label for="photo" class="col-md-2 col-form-label text-md-right">Unggah Gambar</label>
                    <div class="col-md-6">
                        <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror">
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-1">
                    <div class="col-md-6 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save
                        </button>
                        <a href="{{ route('Warga.home') }}" class="btn btn-success">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection