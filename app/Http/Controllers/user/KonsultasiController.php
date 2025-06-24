<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CareerStatement;
use App\Models\StudentAnswer;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Langkah 1: Cek keotentikan user dan role
        if (!Auth::check() || Auth::user()->role !== 'user') {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Langkah 2: Tambahkan pengecekan verifikasi email
        if (!Auth::user()->email_verified_at) { // Cek apakah email sudah diverifikasi
            return redirect()->route('user.dashboard')->with('error', 'Email anda belum diverifikasi tidak dapat melakukan konsultasi. Silakan hubungi admin untuk verifikasi.');
        }

        // Langkah 3: Cek apakah user sudah menjawab pertanyaan atau memiliki history
        $userId = Auth::id();
        $alreadyAnswered = StudentAnswer::where('user_id', $userId)->exists();
        $hasHistory = History::where('user_id', $userId)->exists();
    
        // Langkah 4: Jika sudah menjawab atau memiliki history, redirect dengan pesan error
        if ($alreadyAnswered && $hasHistory) {
            return redirect()->route('user.konsultasi.result')->with('error', 'Anda sudah melakukan pemilihan. Jika ingin melakukan pemilihan ulang, hubungi admin untuk menghapus data lama.');
        }
        // Langkah 5: Ambil semua pernyataan karir
        $careerStatements = CareerStatement::all();
        
        // Langkah 6: Kembalikan view dengan data pernyataan karir
        return view('siswa.konsultasi', compact('careerStatements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $answers = $request->input('answers'); // array: [career_statement_id => jawaban]

        foreach ($answers as $statement_id => $jawaban) {
            StudentAnswer::create([
                'user_id' => $user->id,
                'career_statement_id' => $statement_id,
                'jawaban' => $jawaban,
            ]);
        }

        return redirect()->route('user.konsultasi.proses');
    }

    public function proses(Request $request)
    {
        $user = Auth::user();

        // 1. Ambil semua jawaban "ya" dari user
        $jawabanYa = StudentAnswer::where('user_id', $user->id)
            ->where('jawaban', true)
            ->pluck('career_statement_id')
            ->toArray();

        if (empty($jawabanYa)) {
            return redirect()->route('user.konsultasi.index')->with('error', 'Tidak ada jawaban yang dipilih.');
        }

        // 2. Ambil rules yang berkaitan dengan jawaban "ya"
        $identifikasi = DB::table('rules')
            ->whereIn('career_statement_id', $jawabanYa)
            ->get()
            ->groupBy('career_id'); // hasil: [career_id => list gejala yang cocok]

        $totalIdentifikasi = $identifikasi->flatten()->count(); // JP

        // Jika tidak ada identifikasi ditemukan
        if ($totalIdentifikasi === 0) {
            return redirect()->route('user.konsultasi.index')->with('error', 'Tidak ditemukan kecocokan karir.');
        }

        $hasilPerKarir = [];

        foreach ($identifikasi as $careerId => $matchedGejala) {
            $jumlahCocok = $matchedGejala->count(); // JX

            // Ambil jumlah total rule karir (jumlah seluruh pernyataan pada karir tersebut)
            $jumlahRuleKarir = DB::table('rules')
                ->where('career_id', $careerId)
                ->distinct()
                ->count('career_statement_id');

            // Ambil kode karir (optional, untuk tampilan)
            $kodeKarir = DB::table('careers')->where('id', $careerId)->value('kode_karir');

            // Naive Bayes
            $prior = $jumlahCocok / $totalIdentifikasi;
            $likehood = $jumlahCocok / $jumlahRuleKarir;
            $posterior = $prior * $likehood;

            // Simpan ke database
            History::create([
                'user_id' => $user->id,
                'career_id' => $careerId,
                'prior' => $prior,
                'likehood' => $likehood,
                'probabilitas' => $posterior,
            ]);

            $hasilPerKarir[] = [
                'career_id' => $careerId,
                'kode_karir' => $kodeKarir,
                'prior' => $prior,
                'likehood' => $likehood,
                'posterior' => $posterior,
            ];
        }

        return redirect()->route('user.konsultasi.result')->with('success', 'Prediksi karir berhasil!');
    }

    public function result()
    {
        if (!Auth::check() || Auth::user()->role !== 'user') {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();

        // 1. Ambil waktu prediksi terakhir (paling baru)
        $lastTimestamp = History::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->value('created_at'); // ini akan ambil 1 waktu terakhir

        // Jika belum ada hasil prediksi, redirect ke halaman konsultasi
        if (!$lastTimestamp) {
            return redirect()->route('user.konsultasi.index')->with('error', 'Belum ada hasil prediksi, silakan lakukan pemilihan terlebih dahulu.');
        }

        // 2. Ambil semua hasil prediksi dengan waktu itu
        $latestHistories = History::with('career')
            ->where('user_id', $user->id)
            ->where('created_at', $lastTimestamp)
            ->get();

        // Jika data history kosong, redirect juga
        if ($latestHistories->isEmpty()) {
            return redirect()->route('user.konsultasi.index')->with('error', 'Belum ada hasil prediksi, silakan lakukan konsultasi terlebih dahulu.');
        }

        // 3. Ambil jawaban 'ya'
        $jawabanYa = StudentAnswer::where('user_id', $user->id)
            ->where('jawaban', true)
            ->pluck('career_statement_id')
            ->toArray();

        $gejala_terpilih = CareerStatement::whereIn('id', $jawabanYa)->get();

        // 4. Identifikasi gejala ke karir
        $identifikasi = DB::table('rules')
            ->join('careers', 'rules.career_id', '=', 'careers.id')
            ->join('career_statements', 'rules.career_statement_id', '=', 'career_statements.id')
            ->whereIn('rules.career_statement_id', $jawabanYa)
            ->select(
                'career_statements.kode_pernyataan as kode_pernyataan',
                'careers.kode_karir as kode_karir',
                'careers.nama_karir as nama_karir'
            )
            ->get()
            ->map(fn($row) => [
                'kode_pernyataan' => $row->kode_pernyataan,
                'kode_karir' => $row->kode_karir,
                'nama_karir' => $row->nama_karir,
            ]);

        // 5. Format prior, likelihood, posterior (urutkan dari terbesar ke kecil)
        $prior = $latestHistories->map(fn($h) => [
                'kode_karir' => $h->career->kode_karir,
                'nama_karir' => $h->career->nama_karir,
                'prior' => $h->prior,
            ])
            ->sortByDesc('prior')
            ->values();

        $likehood = $latestHistories->map(fn($h) => [
                'kode_karir' => $h->career->kode_karir,
                'nama_karir' => $h->career->nama_karir,
                'likehood' => $h->likehood,
            ])
            ->sortByDesc('likehood')
            ->values();

        $maxPosterior = $latestHistories->max('probabilitas');

        $posterior = $latestHistories->map(fn($h) => [
                'kode_karir' => $h->career->kode_karir,
                'nama_karir' => $h->career->nama_karir,
                'posterior' => $h->probabilitas,
                'tertinggi' => $h->probabilitas == $maxPosterior,
            ])
            ->sortByDesc('posterior')
            ->values();

        $kesimpulan = $latestHistories
            ->filter(fn($h) => $h->probabilitas == $maxPosterior)
            ->map(fn($h) => [
                'career_id' => $h->career->id,
                'kode_karir' => $h->career->kode_karir,
                'nama_karir' => $h->career->nama_karir,
                'tipe_kepribadian' => $h->career->tipe_kepribadian,
            ])
            ->values();

        return view('siswa.result', compact(
            'gejala_terpilih',
            'identifikasi',
            'prior',
            'likehood',
            'posterior',
            'kesimpulan'
        ));
    }
    
}
