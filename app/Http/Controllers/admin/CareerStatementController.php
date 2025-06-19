<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CareerStatement;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CareerStatementController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil record terakhir berdasarkan kode_pernyataan (pastikan urutan benar)
        $last = CareerStatement::orderBy('kode_pernyataan', 'desc')->first();

        if ($last && preg_match('/KP(\d+)/', $last->kode_pernyataan, $matches)) {
            $nextNumber = (int)$matches[1] + 1;
        } else {
            $nextNumber = 1;
        }

        // Format ke KP01, KP02, ..., KP10, KP41 dst.
        $nextKode = 'KP' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return view('admin.data.career_statement.create', compact('nextKode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input career_statements
        $request->validate([
            'kode_pernyataan' => ['required', 'string', 'max:10', 'unique:career_statements,kode_pernyataan'],
            'isi_pernyataan' => ['required', 'string'],
        ]);

        // Simpan ke tabel career_statements
        CareerStatement::create([
            'kode_pernyataan' => $request->kode_pernyataan,
            'isi_pernyataan' => $request->isi_pernyataan,
        ]);

        return redirect()->route('admin.data.index')->with('success', 'Pernyataan karir berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(CareerStatement $careerStatement)
    {
        return view('admin.data.career_statement.edit', compact('careerStatement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CareerStatement $careerStatement)
    {
        $validatedData = $request->validate([
            'kode_pernyataan' => [
                'required',
                'string',
                'max:10',
                Rule::unique('career_statements', 'kode_pernyataan')->ignore($careerStatement->id),
            ],
            'isi_pernyataan' => ['required', 'string'],
        ]);
    
        $careerStatement->update($validatedData);

        return redirect()->route('admin.data.index')->with('success', 'Pernyataan karir ' . $careerStatement->kode_pernyataan . ' berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $careerStatement = CareerStatement::findOrFail($id);
            $careerStatement->delete(); // Menghapus data user dari database
            return redirect()->route('admin.data.index')
            ->with('success', 'Pernyataan karir '.$careerStatement->kode_pernyataan.' berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.data.index')
            ->with('error', 'Terjadi kesalahan saat menghapus Pernyataan karir: ' . $e->getMessage());
        }
    }
}
