@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="h3 mb-2 text-gray-800">Edit Data User</h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ $user->nik }}" required>
                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ $user->nama_lengkap }}" required>
                            @error('nama_lengkap')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Warga</option>
                                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
                                <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Staff</option>
                                <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Camat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kebangsaan">Kebangsaan</label>
                            <input type="text" class="form-control @error('kebangsaan') is-invalid @enderror" id="kebangsaan" name="kebangsaan" value="{{ $user->kebangsaan }}" required>
                            @error('kebangsaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama" value="{{ $user->agama }}" required>
                            @error('agama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ $user->tempat_lahir }}" required>
                            @error('tempat_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ $user->tanggal_lahir }}" required>
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">Nomor Telepon</label>
                            <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" value="{{ $user->no_telepon }}" required>
                            @error('no_telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="Laki-laki" {{ $user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <!-- Sisipkan input untuk kolom-kolom lainnya sesuai dengan struktur tabel -->
                        <button type="submit" class="btn btn-primary">Update Data User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection