<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerStatement;
use App\Models\Rule;

class DataManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers = Career::paginate(10);
        $careerStatements = CareerStatement::paginate(10);
        $rules = Rule::with('career', 'careerStatement')->paginate(10);

        return view('admin.data.data_management', compact('rules','careers', 'careerStatements'));
    }

}
