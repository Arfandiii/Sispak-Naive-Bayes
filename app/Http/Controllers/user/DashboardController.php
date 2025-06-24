<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;
use Illuminate\Support\Facades\Auth;
use App\Models\History;
use App\Models\StudentAnswer;
use Illuminate\Support\Facades\Hash;



class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Ambil waktu diagnosa terakhir
        $lastTimestamp = History::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->value('created_at');

        // Ambil hasil perhitungan terakhir
        $latestHistories = collect();
        if ($lastTimestamp) {
            $latestHistories = History::with('career')
                ->where('user_id', $user->id)
                ->where('created_at', $lastTimestamp)
                ->orderByDesc('probabilitas')
                ->get();
        }

        // Nilai rekomendasi tertinggi
        $rekomendasiTertinggi = $latestHistories->first();

        // Jumlah karir yang direkomendasikan (posterior > 0)
        $jumlahRekomendasi = $latestHistories
        ->filter(fn($h) => $h->probabilitas > 0.1) // hanya yang > 0.5
        ->sortByDesc('probabilitas')
        ->count();
    
        // Jumlah jawaban "ya"
        $jumlahPernyataan = StudentAnswer::where('user_id', $user->id)
            ->where('jawaban', true)
            ->count();

            $topRekomendasi = $latestHistories
            ->filter(fn($h) => $h->probabilitas > 0.1)
            ->sortByDesc('probabilitas');
        

        return view('siswa.dashboard', compact(
            'rekomendasiTertinggi',
            'jumlahRekomendasi',
            'jumlahPernyataan',
            'topRekomendasi'
        ));
    }

    public function resultDetail($career_id)
    {
        $career = Career::findOrFail($career_id);
    
        return view('siswa.result-detail', compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('siswa.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user(); // Ambil data user yang sedang login

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email, ' . $user->id,
            'phone' => 'nullable|string|max:15',
            'birthdate' => 'nullable|date',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'dob' => $validated['birthdate'],
        ]);

        return redirect()->route('user.dashboard.profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('siswa.profile', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak cocok.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
