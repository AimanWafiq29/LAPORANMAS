<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{

    public function index()
    {
        $kategoris = Kategori::orderByDesc('created_at')->get();
        return view('admin.page.kategori.list', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.page.kategori.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|string',
        ]);
        $kategori = Kategori::create($validateData);
        Alert::success('Berhasil', "Kategori $request->nama berhasil dibuat");
        return redirect()->route('kategoris.index');
    }

    public function show(Kategori $kategori)
    {
       
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.page.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validateData = $request->validate([
            'nama' => 'required|string',
        ]);
        $kategori->update($validateData);
        Alert::success('Berhasil', "Kategori $request->nama berhasil diedit");
        return redirect()->route('kategoris.index');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        Alert::success('Berhasil', "Kategori $kategori->nama berhasil dihapus");
        return redirect()->route('kategoris.index');
    }
}
