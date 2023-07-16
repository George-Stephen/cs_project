<?php

namespace App\Http\Controllers;

use App\Models\study_group;
use Illuminate\Http\Request;
use PHPUnit\Metadata\Uses;

use App\Models\Member;

class MemberController extends Controller
{
    public function index(Request $request, study_group $studyGroup)
    {
        $search = $request->input('search');

        $members = $studyGroup->members()
            ->where('full_name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->paginate(10);

        return view('study-groups.members', compact('studyGroup', 'members', 'search'));
    }
}
