<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class CareerController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil record terakhir berdasarkan kode_karir (pastikan urutan benar)
        $last = Career::orderBy('kode_karir', 'desc')->first();

        if ($last && preg_match('/K(\d+)/', $last->kode_karir, $matches)) {
            $nextNumber = (int)$matches[1] + 1;
        } else {
            $nextNumber = 1;
        }

        // Format ke KR01, KR02, ..., KR10, dst.
        $nextKode = 'K' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return view('admin.data.career.create', compact('nextKode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_karir' => ['required', 'string', 'max:10', 'unique:careers,kode_karir'],
            'nama_karir' => ['required', 'string', 'max:100', 'unique:careers,nama_karir'],
            'tipe_kepribadian' => ['required', 'string', 'max:50'],
            'solusi' => ['required', 'string'],
        ]);

        // Simpan data ke tabel careers
        Career::create([
            'kode_karir' => $request->kode_karir,
            'nama_karir' => $request->nama_karir,
            'tipe_kepribadian' => $request->tipe_kepribadian,
            'solusi' => $request->solusi,
        ]);

        return redirect()->route('admin.data.index')->with('success', 'Karir baru berhasil ditambah.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        return view('admin.data.career.edit' , compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Career $career)
    {
        $validatedData = $request->validate([
            'kode_karir' => ['required', 'string', 'max:10', Rule::unique('careers', 'kode_karir')->ignore($career->id)],
            'nama_karir' => ['required', 'string', 'max:100', Rule::unique('careers', 'nama_karir')->ignore($career->id)],
            'tipe_kepribadian' => ['required', 'string', 'max:50'],
            'solusi' => ['required', 'string'],
        ]);
    
        $career->update($validatedData);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.data.index')->with('success', 'Karir '.$career->nama_karir.' berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $career = Career::findOrFail($id);
            $career->delete(); // Menghapus data user dari database
            return redirect()->route('admin.data.index')
            ->with('success', 'Karir '.$career->kode_karir.' berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.data.index')
            ->with('error', 'Terjadi kesalahan saat menghapus Karir: ' . $e->getMessage());
        }
    }
}
