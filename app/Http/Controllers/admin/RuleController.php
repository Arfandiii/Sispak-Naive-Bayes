<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rule;
use App\Models\Career;
use App\Models\CareerStatement;

class RuleController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data karir & pernyataan untuk dropdown
        $careers = Career::orderBy('nama_karir')->get();
        $statements = CareerStatement::orderBy('kode_pernyataan')->get();

        return view('admin.data.rule.create', compact('careers', 'statements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_rule' => 'required|string|max:10',
            'career_id' => 'required|exists:careers,id',
            'career_statement_id' => 'required|exists:career_statements,id',
        ]);

        Rule::create([
            'kode_rule' => $request->kode_rule,
            'career_id' => $request->career_id,
            'career_statement_id' => $request->career_statement_id,
        ]);
        return redirect()->route('admin.data.index')->with('success', 'Rule baru berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rule $rule)
    {
        $careers = Career::orderBy('nama_karir')->get();
        $statements = CareerStatement::orderBy('kode_pernyataan')->get();
        return view('admin.data.rule.edit', compact('rule', 'careers', 'statements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rule $rule)
    {
        $request->validate([
            'kode_rule' => 'required|string|max:10' . $rule->id,
            'career_id' => 'required|exists:careers,id',
            'career_statement_id' => 'required|exists:career_statements,id',
        ]);
    
        $rule->update([
            'kode_rule' => $request->kode_rule,
            'career_id' => $request->career_id,
            'career_statement_id' => $request->career_statement_id,
        ]);

        return redirect()->route('admin.data.index')->with('success', 'Rule '.$rule->kode_rule.' berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $rule = Rule::findOrFail($id);
            $rule->delete(); // Menghapus data user dari database
            return redirect()->route('admin.data.index')
            ->with('success', 'Rule '.$rule->kode_rule.' berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.data.index')
            ->with('error', 'Terjadi kesalahan saat menghapus Karir: ' . $e->getMessage());
        }
    }
}
