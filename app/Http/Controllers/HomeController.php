<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function homeWarga()
    {
        $pengaduans = Pengaduan::where('user_id', auth()->user()->id)->get();
        return view('warga.index', compact('pengaduans'));
    }

    public function homeAdmin()
    {
        $totalPengaduanCount = Pengaduan::count();
        $dataPengaduanBaruCount = Pengaduan::where('status', 'baru')->count();
        $dataPengaduanDiprosesCount = Pengaduan::where('status', 'diproses')->count();
        $dataPengaduanSelesaiCount = Pengaduan::where('status', 'selesai')->count();
        return view('admin.index', compact('totalPengaduanCount','dataPengaduanBaruCount','dataPengaduanDiprosesCount','dataPengaduanSelesaiCount'));
    }

    public function homeStaff()
    {
        return view('Staff.index');
    }

    public function homeCamat()
    {
        return view('Camat.index');
    }
}
