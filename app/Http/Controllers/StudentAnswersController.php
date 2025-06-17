<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\CareerStatement;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentAnswer;


class StudentAnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check() || Auth::user()->role !== 'user') {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek jika user sudah pernah menjawab
        $alreadyAnswered = StudentAnswer::where('user_id', Auth::user()->id)->exists();
        if ($alreadyAnswered) {
            return redirect()->route('user.results')->with('error', 'Anda sudah melakukan pemilihan. Jika ingin melakukan pemilihan ulang, data lama akan dihapus.');
        }

        $careers = Career::all();
        $careerStatements = CareerStatement::all();
        return view('sections.konsultasi', compact('careers', 'careerStatements'));
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
        // if (!Auth::check()) {
        //     return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        // }
    
        $request->validate([
            'statements' => 'required|array',
        ]);
    
        // Clear previous answers for the user
        StudentAnswer::where('user_id', Auth::user()->id)->delete();
    
        // Store new answers
        foreach ($request->statements as $statementId) {
            StudentAnswer::create([
                'user_id' => Auth::user()->id,
                'career_statement_id' => $statementId,
                'jawaban' => true,
            ]);
        }
    
        // Redirect to results page
        return redirect()->route('user.results');
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

    public function showResults()
    {
        // if (!Auth::check()) {
        //     return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        // }
    
        $userAnswers = StudentAnswer::where('user_id', Auth::user()->id)->get();
        $careerStatements = CareerStatement::all();
        $careers = Career::all();
    
        // Here you would implement your logic to calculate career recommendations
        // based on the user's answers and the rules in your database
    
        return view('sections.result', compact('userAnswers', 'careerStatements', 'careers'));
    }
}
