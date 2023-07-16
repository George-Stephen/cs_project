<?php

namespace App\Http\Controllers;

use App\Mail\StudyGroupApplication;
use App\Mail\StudyGroupApproval;
use App\Models\Category;
use App\Models\Member;
use App\Models\study_group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

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
        $request ->validate([
            'group_name' => 'required|max:255',
            'category_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'group_link' => 'required',
            'description' => 'required',
            'max_members' => 'required|integer|min:1|max:30',
        ]);

        $studyGroup =  new study_group([
            'group_name' => $request->input('group_name'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'group_link' => $request->input('group_link'),
            'max_members' => $request->input('max_members'),
            'creator_id' => Auth::id(), // Set the creator ID
        ]);

        $studyGroup->save();


        return redirect()->route('study-groups.index')->with('success', 'Study group created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $studyGroup = study_group::findOrFail($id);
        $user = Auth::user();
        $member = Member::where('study_group_id', $studyGroup->id)->where('user_id', $user->id);
        $isMember = $member->exists();
        

        $user_id = $user->id;

        if ($isMember) {
            $applicationStatus = $member->first()->applicant_status;
        } else {
            $applicationStatus = null;
        }

        $isApproved = $applicationStatus === 'approved';
        $isPending = $applicationStatus === 'pending';

        return view('study-groups.show', compact('studyGroup', 'isMember', 'isApproved', 'isPending','user_id'));
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

        if( $studyGroup -> isCreatedBy(Auth::user())){
            
            $studyGroup->delete();
            return redirect()->route('study-groups.index')->with('success', 'Your Study group has been deleted successfully.');
        }
    }

    public function join(Request $request, study_group $studyGroup)
{
    // Check if the user is already a member of the study group
    if ($studyGroup->members()->where('user_id', Auth::id())->exists()) {
        return redirect()->route('study-groups.show', $studyGroup)->with('error', 'You are already a member of this study group.');
    } elseif ($studyGroup->members()->count() >= $studyGroup->max_members) {
        // Check if the study group is full
        return redirect()->route('study-groups.show', $studyGroup)->with('error', 'This study group is full.');
    } else {
        // Apply to join the study group
        $studyGroup->members()->attach(Auth::id());
        // Send email to the study group creator
        $creator = $studyGroup->creator;
        $applicant = Auth::user();



        // Send email notification to the creator
        Mail::to($creator->email)->send(new StudyGroupApplication($studyGroup, $applicant, $creator));
        return redirect()->route('study-groups.show', $studyGroup)->with('success', 'You have successfully applied to join the study group.');
    }
}

public function showApprovalForm(study_group $studyGroup, User $applicant)
{
    $groupCreator = $studyGroup->creator;
    
    return view('study-groups.approval-form', compact('studyGroup', 'applicant', 'groupCreator'));
}

public function approve(study_group $studyGroup, User $applicant)
    {
    // Perform your approval logic (e.g., update database records)

    $member = Member::where('user_id', $applicant->id)
        ->where('study_group_id', $studyGroup -> id)-> first();

    if ($member) {
        $member->applicant_status = 'approved';
        $member->save();
        // Send email notification to the applicant
        Mail::to($applicant->email)->send(new StudyGroupApproval($studyGroup,$applicant));
    }
    // For example:
    return redirect()->route('study-groups.show', $studyGroup)->with('success', 'The applicant has been approved and notified.');
    }
}

