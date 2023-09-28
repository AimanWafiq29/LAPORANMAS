<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{

    public function index()
    {
        $pengaduans = Pengaduan::orderByDesc('created_at')->get();
        return view('admin.page.pengaduan.list', compact('pengaduans'));
    }

    public function listBaru()
    {
        $pengaduans = Pengaduan::where('status', 'baru')->get();
        return view('admin.page.pengaduan.listBaru', compact('pengaduans'));
    }
    public function listProses()
    {
        $pengaduans = Pengaduan::where('status', 'diproses')->get();
        return view('admin.page.pengaduan.listProses', compact('pengaduans'));
    }
    public function listSelesai()
    {
        $pengaduans = Pengaduan::where('status', 'selesai')->get();
        return view('admin.page.pengaduan.listSelesai', compact('pengaduans'));
    }


    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.page.pengaduan.create', compact('kategoris'));
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required',
            'deskripsi' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validate photo
        ]);

        $pengaduan = new Pengaduan([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'deskripsi' => $request->deskripsi,
            'status' => 'baru', // Set status default
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('gambarPengaduan', 'public');
            $pengaduan->foto_pengaduan = $photoPath;
        }

        $pengaduan->user_id = auth()->user()->id;
        $pengaduan->save();

        Alert::success('Berhasil', "Pengaduan $request->judul berhasil dibuat");
        return redirect()->route('pengaduans.index');
    }

    public function show(Pengaduan $pengaduan)
    {
        return view('admin.page.pengaduan.show', compact('pengaduan'));
    }

    public function edit(Pengaduan $pengaduan)
    {
        $kategoris = Kategori::all();
        return view('admin.page.pengaduan.edit', compact('pengaduan', 'kategoris'));
    }

    public function update(Request $request, $id)
    {

        $validateData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required',
            'deskripsi' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validate photo
        ]);

        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->judul = $request->judul;
        $pengaduan->kategori_id = $request->kategori_id;
        $pengaduan->deskripsi = $request->deskripsi;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('foto_pengaduan', 'public');
            $pengaduan->foto_pengaduan = $photoPath;
        }

        $pengaduan->save();
        Alert::success('Berhasil', "Pengaduan $request->judul berhasil diedit");
        return redirect()->route('pengaduans.index');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        // $pengaduan->delete();
        Alert::success('Berhasil', "Pengaduan $pengaduan->judul berhasil dihapus");
        return redirect()->route('pengaduans.index');
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'status' => 'required|in:baru,diproses,selesai',
        ]);

        // Find the Pengaduan by ID
        $pengaduan = Pengaduan::findOrFail($id);

        // Update the Pengaduan's status
        $pengaduan->update([
            'status' => $validatedData['status'],
        ]);

        // Redirect back to the Pengaduan detail page with success message
        Alert::success('Berhasil', "Status pengaduan berhasil diubah");
        return redirect()->route('pengaduans.show', compact('pengaduan'));
    }

    public function updateTanggapan(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $tanggapan = $pengaduan->tanggapan->first();

        // Validasi input sesuai kebutuhan
        $request->validate([
            'tanggapan' => 'required|string',
        ]);

        // Update isi tanggapan
        $tanggapan->update([
            'isi_tanggapan' => $request->input('tanggapan'),
        ]);

        Alert::success('Berhasil', "Tanggapan pengaduan berhasil diubah");
        return redirect()->route('pengaduans.show', compact('pengaduan'));
    }

    public function createTanggapan(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        // Validasi input sesuai kebutuhan
        $request->validate([
            'tanggapan' => 'required|string',
        ]);

        // Buat tanggapan baru
        $tanggapan = new Tanggapan([
            'pengaduan_id' => $id,
            'user_id' => auth()->user()->id,
            'isi_tanggapan' => $request->input('tanggapan'),
        ]);
        $tanggapan->save();

        Alert::success('Berhasil', "Tanggapan pengaduan berhasil di tanggapi");
        return redirect()->route('pengaduans.show', compact('pengaduan'));
    }


    public function pengaduanWargaShow($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('warga.show', compact('pengaduan'));
    }

    public function pengaduanWargaCreate()
    {
        $kategoris = Kategori::all();
        return view('warga.create', compact('kategoris'));
    }

    public function pengaduanWargaStore(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required',
            'deskripsi' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validate photo
        ]);

        $user = auth()->user();

        // Periksa apakah pengguna memiliki profil lengkap
        if (
            $user->nik === null ||
            $user->nama_lengkap === null ||
            $user->kebangsaan === null ||
            $user->agama === null ||
            $user->tempat_lahir === null ||
            $user->tanggal_lahir === null ||
            $user->no_telepon === null
        ) {
            Alert::warning("Silahkan Lengkapi data pelapor terlebih dahulu");
            return redirect()->route('warga.edit')->with('warning', 'Silakan lengkapi profil Anda sebelum membuat pengaduan.');
        }


        $pengaduan = new Pengaduan([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'deskripsi' => $request->deskripsi,
            'status' => 'baru', // Set status default
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('gambarPengaduan', 'public');
            $pengaduan->foto_pengaduan = $photoPath;
        }

        $pengaduan->user_id = auth()->user()->id;
        $pengaduan->save();

        Alert::success('Berhasil', "Pengaduan $request->judul berhasil dibuat");
        return redirect()->route('warga.home');
    }

    public function pengaduanWargaDestroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();
        Alert::success('Berhasil', "Pengaduan $pengaduan->judul berhasil dihapus");
        return redirect()->route('warga.home');
    }
}
