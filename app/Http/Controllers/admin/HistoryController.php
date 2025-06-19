<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\History;
use App\Models\StudentAnswer;
use App\Models\User;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil user yang memiliki history, dan ambil juga data history beserta career-nya
        $users = User::whereHas('histories')
            ->with(['histories.career']) // eager load untuk mencegah query N+1
            ->paginate(5); // paginate per user

        return view('admin.history.index', compact('users'));
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
        $history = History::findOrFail($id);
        $userId = $history->user_id;
    
        // Hapus semua history milik user
        History::where('user_id', $userId)->delete();
    
        // Opsional: Hapus juga data jawaban siswa jika ingin konsultasi diulang
        StudentAnswer::where('user_id', $userId)->delete();
    
        return redirect()->route('admin.history.index')->with('success', 'Data konsultasi berhasil dihapus.');
    }
    
}
