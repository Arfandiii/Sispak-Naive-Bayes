<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\History;
use App\Models\Career;
use App\Models\CareerStatement;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalHistory = History::distinct('user_id')->count('user_id');
        $totalCareer = Career::count();
        $totalCareerStatement = CareerStatement::count();
        // Konsultasi per bulan (6 bulan terakhir)
        $recentActivities = History::select('user_id', 'created_at')
        ->distinct()
        ->orderByDesc('created_at')
        ->with('user')
        ->take(5)
        ->get();
        
        // Aktivitas terakhir
        $latestHistories = History::select('user_id', DB::raw('MAX(created_at) as latest'))
        ->groupBy('user_id')
        ->orderByDesc('latest')
        ->take(5)
        ->get()
        ->map(function($item) {
            $user = \App\Models\User::find($item->user_id);
            return (object) [
                'user' => $user,
                'created_at' => Carbon::parse($item->latest) // konversi string ke Carbon
            ];
        });

        $days = collect(range(0, 29))->map(function ($i) {
            return Carbon::now()->subDays($i)->format('d M'); // atau 'd M Y' kalau ingin lengkap
        })->reverse()->values();        
        
        $dailyUsers = collect(range(0, 29))->map(function ($i) {
            return User::where('role', 'user')
                ->whereDate('created_at', Carbon::now()->subDays($i)->toDateString())
                ->count();
        })->reverse()->values();

        $dailyHistories = collect(range(0, 29))->map(function ($i) {
            $date = Carbon::now()->subDays($i)->toDateString();
            return History::whereDate('created_at', $date)
                ->selectRaw('DATE(created_at) as date, user_id')
                ->get()
                ->groupBy(function ($item) {
                    return $item->user_id . '|' . $item->date;
                })
                ->count();
        })->reverse()->values();

        return view('admin.dashboard', compact(
            'totalUsers', 'totalHistory',
            'recentActivities', 'latestHistories', 'totalCareer', 'totalCareerStatement', 'days', 'dailyUsers', 'dailyHistories'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user(); // Ambil data user yang sedang login

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);
    
        return redirect()->route('admin.dashboard.profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
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
