<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataInventaris = [
            'total_aset' => 15,
            'aset_baik' => 12,
            'aset_rusak' => 3,
            'daftar_aset' => [
                [
                    'kode' => 'AST-001',
                    'nama' => 'Komputer Server',
                    'kondisi' => 'Baik',
                    'lokasi' => 'Kantor Desa'
                ],
                [
                    'kode' => 'AST-002',
                    'nama' => 'Printer Epson',
                    'kondisi' => 'Baik',
                    'lokasi' => 'Kantor Desa'
                ],
                [
                    'kode' => 'AST-003',
                    'nama' => 'Meja Rapat',
                    'kondisi' => 'Rusak Ringan',
                    'lokasi' => 'Aula Desa'
                ]
            ]
        ];

        // Passing data ke view
        return view('home-inventaris', $dataInventaris);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
