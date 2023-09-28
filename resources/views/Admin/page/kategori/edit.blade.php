@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Edit kategori</h1>
        </div>
    </div>
    <br>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form kategori</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('kategoris.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="nama" class="col-md-2 col-form-label text-md-right">
                        Kategori
                    </label>
                    <div class="col-md-6">
                        <input id="nama" type="text" class="form-control col-md-8 @error('nama') is-invalid @enderror" name="nama" value="{{$kategori->nama}}" autofocus>
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-1">
                    <div class="col-md-6 offset-md-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{route('kategoris.index')}}" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection