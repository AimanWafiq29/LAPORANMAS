@extends('layouts.app')

@push('style')
<link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<style>
    .custom-card {
        margin-bottom: 20px;
    }

    .custom-image {
        max-height: 300px;
        object-fit: cover;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Detail Pengaduan</h1>
        </div>
        <br>
        <div class="col-md-6 text-right">
            <a class="btn btn-success" href="{{ route('warga.home')}}">
                <i class="fas fa-plus" title="Tambah Data"> Kembali</i>
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card custom-card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengadu</h6>
                </div>
                <div class="card-body">
                    <p><strong>NIK:</strong> {{ $pengaduan->user->nik }}</p>
                    <p><strong>Nama Lengkap:</strong> {{ $pengaduan->user->nama_lengkap }}</p>
                    <p><strong>Email:</strong> {{ $pengaduan->user->email }}</p>
                    <p><strong>Tempat tanggal lahir:</strong> {{ $pengaduan->user->tempat_lahir }}, {{$pengaduan->user->tanggal_lahir}}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ $pengaduan->user->jenis_kelamin }}</p>
                    <p><strong>Kebangsaan:</strong> {{ $pengaduan->user->kebangsaan }}</p>
                    <p><strong>Agama:</strong> {{ $pengaduan->user->agama }}</p>
                    <p><strong>Telp/Hp:</strong> {{ $pengaduan->user->no_telepon }}</p>
                    <p><strong>Alamat:</strong> {{ $pengaduan->user->alamat }}</p>
                </div>
            </div>
            <div class="card custom-card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
                </div>
                <div class="card-body">
                    <p><strong>Judul Pengaduan:</strong> {{ $pengaduan->judul }}</p>
                    <p><strong>Kategori Pengaduan:</strong> {{ $pengaduan->kategori->nama }}</p>
                    <p><strong>Waktu Pengaduan:</strong> {{ $pengaduan->created_at->format('Y-m-d H:i:s') }}</p>
                    <p><strong>Keterangan:</strong> {{ $pengaduan->deskripsi }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($pengaduan->status) }}</p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="col-md-6">
            <div class="card custom-card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gambar Pengaduan</h6>
                </div>
                <div class="card-body">
                    <img src="{{ Storage::url($pengaduan->foto_pengaduan) }}" class="card-img-top custom-image" alt="pengaduan Photo">
                </div>
            </div>
        </div>
    </div>
    @if ($pengaduan->tanggapan->count() > 0)
    <div class="card custom-card mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tanggapan</h6>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="tanggapan">Tanggapan:</label>
                <textarea class="form-control" id="tanggapan" name="tanggapan" rows="4">{{ $pengaduan->tanggapan->first()->isi_tanggapan }}</textarea>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection