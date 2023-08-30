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
    <div class="container-fluid">
        <div class="row">

            <!-- Total Pengaduan Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Total Pengaduan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPengaduanCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card for Data Pengaduan Baru -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Data Pengaduan Baru</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataPengaduanBaruCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-inbox fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card for Data Pengaduan Diproses -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Data Pengaduan Diproses</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataPengaduanDiprosesCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-spinner fa-spin fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card for Data Pengaduan Selesai -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Data Pengaduan Selesai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataPengaduanSelesaiCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
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