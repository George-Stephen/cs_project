<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\study_group;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = 10;

        $query = study_group::with('category');

        if ($search) {
            $query->where('group_name', 'LIKE', "%{$search}%")
                ->orWhere('group_course', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        }
        $studyGroups = $query->paginate($perPage);

        return view('study-groups.index', compact('studyGroups','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('study-groups.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        

        $validatedData = $request ->validate([
            'group_name' => 'required|max:255',
            'group_course' => 'required',
            'category_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'group_link' => 'required',
            'description' => 'required',
            'max_members' => 'required|integer|min:1|max:30',
        ]);
        study_group::create($validatedData);

        return redirect()->route('study-groups.index')->with('success', 'Study group created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $studyGroup = study_group::findOrFail($id);

        return view('study-groups.show', compact('studyGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $studyGroup = study_group::findOrFail($id);

        return view('study-groups.edit', compact('studyGroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'group_name' => 'required|max:255',
            'group_course' => 'required',
            'group_link' => 'required',
            'description' => 'required',
            'max_members' => 'required',
            // Add any other validation rules for your form fields
        ]);

        $studyGroup = study_group::findOrFail($id);
        $studyGroup->update($validatedData);

        return redirect()->route('study-groups.index')->with('success', 'Study group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $studyGroup= study_group::findOrFail($id);
        $studyGroup->delete();

        return redirect()->route('study-groups.index')->with('success', 'Your Study group has been deleted successfully.');
    }
}
