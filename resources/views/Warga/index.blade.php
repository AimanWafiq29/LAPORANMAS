@extends('layouts.app')

@section('content')
<div class="container">

    <br>
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Data Aduan Anda</h1>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-success" href="{{ route('pengaduanWarga.create')}}">
                <i class="fas fa-plus" title="Tambah Data"> Buat Aduan</i>
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
                                    <a href="{{ route('pengaduanWarga.show', $pengaduan->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye" title="Detail"></i> <!-- Icon for Detail -->
                                    </a>
                                    <!-- <a href="{{ route('pengaduanWarga.edit', $pengaduan->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit" title="Edit"></i> 
                                    </a> -->
                                    <form class="d-inline" action="{{route('pengaduanWarga.destroy',['pengaduanWarga' => $pengaduan->id])}}" method="POST">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#carouselExampleControls').carousel({
            interval: 3000
        });
    });
</script>
@endsection


