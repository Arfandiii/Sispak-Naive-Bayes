<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CareerStatement;
use App\Models\StudentAnswer;
use App\Models\Career;
use App\Models\History;
use App\Models\Rule;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check() || Auth::user()->role !== 'user') {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $alreadyAnswered = StudentAnswer::where('user_id', Auth::id())->exists();
        if ($alreadyAnswered) {
            return redirect()->route('user.konsultasi.result')->with('error', 'Anda sudah melakukan pemilihan. Jika ingin melakukan pemilihan ulang, hubungi admin untuk menghapus data lama.');
        }

        $careerStatements = CareerStatement::all();
        return view('siswa.konsultasi', compact('careerStatements'));
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

    public function proses(Request $request)
    {
        $user = Auth::user();

        // Validasi & Simpan jawaban
        $request->validate(['statements' => 'required|array']);
        StudentAnswer::where('user_id', $user->id)->delete();
        foreach ($request->statements as $statementId) {
            StudentAnswer::create([
                'user_id' => $user->id,
                'career_statement_id' => $statementId,
                'jawaban' => true,
            ]);
        }
        
        // Data siswa
        $jawabanUser = StudentAnswer::where('user_id', $user->id)
        ->where('jawaban', true)
        ->pluck('career_statement_id')
        ->toArray();

        $careerScores = [];
        $totalRules = Rule::select('career_id')->distinct()->count(); // JP (jumlah semua rule unik karir)

        // Hitung per karir
        foreach (Career::all() as $career) {
            $rules = Rule::where('career_id', $career->id)->pluck('career_statement_id')->toArray();
            $JX = count($rules); // jumlah rule di karir ini
            $JP = Rule::count(); // total semua rule

            if ($JX == 0) continue;

            // P(X): prior
            $prior = $JX / $JP;

            // P(G|X): likelihood
            $likelihood = 1;
            foreach ($jawabanUser as $jawab) {
                $likelihood *= in_array($jawab, $rules) ? (1 / $JX) : (1e-6); // smoothing
            }

            // P(X|G): posterior
            $posterior = $prior * $likelihood;
            $careerScores[$career->id] = $posterior;
        }

        // Ambil hasil terbaik
        arsort($careerScores);
        $careerId = array_key_first($careerScores);
        $probabilitas = number_format($careerScores[$careerId], 6);
        $prior = number_format($careerScores[$careerId], 6);
        $likelihood = number_format($careerScores[$careerId], 6);

        // Simpan ke riwayat
        History::create([
            'user_id' => $user->id,
            'career_id' => $careerId,
            'probabilitas' => $probabilitas,
            'prior' => $prior,
            'likelihood' => $likelihood
        ]);

        // Kirim ke halaman hasil
        $history = History::where('user_id', $user->id)->get();

        return redirect()->route('konsultasi.hasil')->with([
            'career' => Career::find($careerId),
            'probabilitas' => $probabilitas,
            'history' => $history
        ]);
    }

    public function result()
    {
        if (!Auth::check() || Auth::user()->role !== 'user') {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $userId = Auth::id();
        $latest = History::where('user_id', $userId)->latest()->first();
        $career = $latest?->career;

        return view('siswa.result', [
            'career' => $career,
            'probabilitas' => $latest?->probabilitas ?? null,
        ]);
    }
    
}
