<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Media;
use App\Models\KategoriAset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $columns = ['kondisi'];
        $asets = Aset::with('kategoriAset') // Eager load relasi
                    ->filter($request, $columns) // Panggil scopeFilter
                    ->latest()
                    ->get();
        return view('pages.aset.index', compact('asets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = KategoriAset::all(); // Ambil semua kategori
        return view('pages.aset.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_aset' => 'required|unique:asets,kode_aset',
            'nama_aset' => 'required',
            'kategori_id' => 'required|exists:kategori_asets,kategori_id',
            'tanggal_perolehan' => 'required|date',
            'nilai_perolehan' => 'required|numeric',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'lokasi' => 'required',
            'penanggung_jawab' => 'required'
        ]);

        Aset::create($request->all());

        return redirect()->route('aset.index')
            ->with('success', 'Data aset berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aset $aset)
    {
        // Ambil data media
    $files = Media::where('ref_table', 'aset') // Coba pakai nama singular
              ->where('ref_id', $aset->id)
              ->latest()
              ->get();

    return view('pages.aset.show', compact('aset', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aset $aset)
    {
        $kategoris = KategoriAset::all(); // Ambil semua kategori
        return view('pages.aset.edit', compact('aset', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aset $aset)
    {
        $request->validate([
            'kode_aset' => 'required|unique:asets,kode_aset,' . $aset->id . ',id',
            'nama_aset' => 'required',
            'kategori_id' => 'required|exists:kategori_asets,kategori_id', // Validasi baru
            'tanggal_perolehan' => 'required|date',
            'nilai_perolehan' => 'required|numeric',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'lokasi' => 'required',
            'penanggung_jawab' => 'required'
        ]);

        $aset->update($request->all());
        return redirect()->route('aset.index')->with('success', 'Data aset berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aset $aset)
    {
        $aset->delete();
        return redirect()->route('aset.index')->with('success', 'Data aset berhasil dihapus!');
    }
}
