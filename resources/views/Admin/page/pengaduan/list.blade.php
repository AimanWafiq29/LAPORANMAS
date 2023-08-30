@extends('layouts.dashboard')

@push('style')
<link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('sidebar')
@include('Admin.layouts.sidebar')
@endsection

@section('topbar')
@include('Admin.layouts.topbar')
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Data Pengaduan</h1>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-success" href="{{ route('pengaduans.create')}}">
                <i class="fas fa-plus" title="Tambah Data"> Tambah Data</i>
            </a>
        </div>
    </div>
    <br>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Pengaduan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengaduans as $pengaduan)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $pengaduan->judul }}</td>
                            <td>
                                @if($pengaduan->status === 'baru')
                                <span class="badge badge-danger">{{ ucfirst($pengaduan->status) }}</span>
                                @elseif($pengaduan->status === 'diproses')
                                <span class="badge badge-warning">{{ ucfirst($pengaduan->status) }}</span>
                                @elseif($pengaduan->status === 'selesai')
                                <span class="badge badge-success">{{ ucfirst($pengaduan->status) }}</span>
                                @endif
                            </td>
                            <td>{{ $pengaduan->created_at->format('Y-m-d H:i:s') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('pengaduans.show', $pengaduan->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye" title="Detail"></i> <!-- Icon for Detail -->
                                    </a>
                                    <a href="{{ route('pengaduans.edit', $pengaduan->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit" title="Edit"></i> <!-- Icon for Edit -->
                                    </a>
                                    <form action="{{ route('pengaduans.destroy', $pengaduan->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-hapus" data-table="pengaduan" title="Hapus Pendaduan" data-name="{{$pengaduan->judul}}">
                                            <i class="fas fa-trash" title="Hapus"></i> <!-- Icon for Delete -->
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">No pengaduans found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
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