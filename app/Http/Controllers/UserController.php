<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('created_at')->get();
        return view('admin.page.user.list', compact('users'));
    }

    public function listWarga()
    {
        $users = User::where('role', 0)->get();
        return view('admin.page.user.listWarga', compact('users'));
    }

    public function listStaff()

    {
        $users = User::where('role', 2)->get();
        return view('admin.page.user.listStaff', compact('users'));
    }

    public function listAdmin()
    {
        $users = User::where('role', 1)->get();
        return view('admin.page.user.listAdmin', compact('users'));
    }

    public function create()
    {
        return view('admin.page.user.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:0,1,2,3',
            'kebangsaan' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        Alert::success('Berhasil', "Data $request->nama_lengkap berhasil dibuat");
        return redirect()->route('users.index');
    }

    public function show(user $user)
    {
        return view('admin.page.user.show', compact('user'));
    }

    public function edit(user $user)
    {
        return view('admin.page.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'nik' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'role' => 'required|in:0,1,2,3',
            'kebangsaan' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            // tambahkan validasi untuk kolom-kolom lainnya sesuai dengan struktur tabel
        ]);

        $user->update($validatedData);
        Alert::success('Berhasil', "Data $user->nama_lengkap berhasil diedit");
        return redirect()->route('users.index');
    }

    public function destroy(user $user)
    {
        $user->delete();
        Alert::success('Berhasil', "Data $user->nama_lengkap berhasil dehapus");
        return redirect()->route('users.index');
    }

    public function updateRole(Request $request, User $user)
    {

        $validatedData = $request->validate([
            'role' => 'required|in:0,1,2,3',
        ]);

        $user->update([
            'role' => $validatedData['role'],
        ]);

        Alert::success('Berhasil', "Status Role berhasil diubah");
        return redirect()->route('users.show', compact('user'));
    }

    public function wargaStore(Request $request)
    {
        $validatedData = $request->validate([

            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
        ]);

        // Tetapkan 'nik' ke null
        $validatedData['nik'] = null;
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = 0; // Tetapkan nilai role ke 0

        $user = User::create($validatedData); // Buat pengguna baru

        // Setelah pengguna berhasil mendaftar, langsung arahkan ke 'warga.home'
        auth()->login($user); // Autentikasi pengguna yang baru saja mendaftar

        Alert::success('Berhasil', "Data $request->nama_lengkap berhasil dibuat");
        return redirect()->route('warga.home');
    }

    public function wargaEdit()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);

        return view('Warga.edit', compact('user'));
    }

    public function wargaUpdate(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'nik' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'role' => 'required|in:0,1,2,3',
            'kebangsaan' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $user->update($validatedData);
        Alert::success('Berhasil', "Data $user->nama_lengkap berhasil diedit");
        return redirect()->route('pengaduanWarga.create');
    }

    public function wargaShow(user $user)
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        return view('Warga.profil', compact('user'));
    }
}
