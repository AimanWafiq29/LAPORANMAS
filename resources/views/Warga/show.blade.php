@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Detail Pengaduan</h1>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-success" href="{{ route('Warga.home')}}">
                <i class="fas fa-arrow-left" title="Tambah Data"> Kembali</i>
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
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
    <div class="card custom-card mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tanggapan</h6>
        </div>
        <div class="card-body">
            @if ($pengaduan->tanggapan->count() > 0)
            <div class="form-group">
                <label for="tanggapan">Tanggapan:</label>
                <textarea class="form-control" id="tanggapan" name="tanggapan" rows="4" disabled>{{ $pengaduan->tanggapan->first()->isi_tanggapan }}</textarea>
            </div>
            @else
            <div class="text-center">
                Belum ada tanggapan
            </div>
            @endif
        </div>
    </div>
</div>
@endsection