@extends('layouts.dashboard')

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
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Detail Pengaduan</h1>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-success" href="{{ route('pengaduans.index')}}">
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
    <div class="card custom-card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Status Pengaduan</h6>
        </div>
        <div class="card-body">
            <!-- Form untuk mengubah status pengaduan -->
            <form action="{{ route('pengaduans.updateStatus', $pengaduan->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="baru" {{ $pengaduan->status === 'baru' ? 'selected' : '' }}>baru</option>
                        <option value="diproses" {{ $pengaduan->status === 'diproses' ? 'selected' : '' }}>diproses</option>
                        <option value="selesai" {{ $pengaduan->status === 'selesai' ? 'selected' : '' }}>selesai</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Status</button>
            </form>
        </div>
    </div>
    <div class="card custom-card mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tanggapan</h6>
        </div>
        <div class="card-body">
            @if ($pengaduan->tanggapan->count() > 0)
            <!-- Form untuk mengedit tanggapan -->
            <form action="{{ route('pengaduans.updateTanggapan', $pengaduan->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="tanggapan">Tanggapan:</label>
                    <textarea class="form-control" id="tanggapan" name="tanggapan" rows="4">{{ $pengaduan->tanggapan->first()->isi_tanggapan }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Tanggapan</button>
            </form>
            @else
            <!-- Form untuk membuat tanggapan baru -->
            <form action="{{ route('pengaduans.createTanggapan', $pengaduan->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tanggapan">Tanggapan:</label>
                    <textarea class="form-control" id="tanggapan" name="tanggapan" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Tanggapan</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Page level plugins -->
<script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>
@endpush