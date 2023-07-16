<?php

namespace App\Http\Controllers;

use App\Models\study_group;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studyGroups = study_group::latest()->take(10)->get();

        return view('dashboard', compact('studyGroups'));
    }
}
