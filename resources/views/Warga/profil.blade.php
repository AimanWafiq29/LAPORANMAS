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
            <h1 class="h3 mb-2 text-gray-800">Detail User</h1>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-success" href="{{ route('warga.home')}}">
                <i class="fas fa-plus" title="Tambah Data"> Kembali</i>
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <!-- <div class="col-md-6">
            <div class="card custom-card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gambar User</h6>
                </div>
                <div class="card-body">
                    <img src="{{ Storage::url($user->foto_User) }}" class="card-img-top custom-image" alt="User Photo">
                </div>
            </div>
        </div> -->
        <div class="col-md-6">
            <div class="card custom-card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                </div>
                <div class="card-body">
                    <p><strong>NIK:</strong> {{$user->nik }}</p>
                    <p><strong>Nama Lengkap:</strong> {{$user->nama_lengkap }}</p>
                    <p><strong>Email:</strong> {{$user->email }}</p>
                    <p><strong>Tempat tanggal lahir:</strong> {{$user->tempat_lahir }}, {{$user->tanggal_lahir}}</p>
                    <p><strong>Jenis Kelamin:</strong> {{$user->jenis_kelamin }}</p>
                    <p><strong>Kebangsaan:</strong> {{$user->kebangsaan }}</p>
                    <p><strong>Agama:</strong> {{$user->agama }}</p>
                    <p><strong>Telp/Hp:</strong> {{$user->no_telepon }}</p>
                    <p><strong>Alamat:</strong> {{$user->alamat }}</p>
                </div>
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