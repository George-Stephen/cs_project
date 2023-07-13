<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question:: latest() -> paginate(10);
        return view('question-module.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('question-module.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'asked_by' => Auth::id(),
        ]);

        Question:: create($validatedData);

        return redirect()->route('question-module.index')->with('success', 'Question created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question:: findOrFail($id);
        return view('question-module.show', compact('question')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::findOrFail($id);

        return view('question-module.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request-> validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'upvotes' => 'required',
            'downvotes' => 'required',
            'asked_by' => Auth::user()->id,
        ]);
        $question =  Question::findOrfail($id)->update($validatedData);
        return redirect() -> route('question-module.index') ->with('success', 'Your Question has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question= Question::findOrFail($id);
        $question->delete();

        return redirect()->route('question-module.index')->with('success', 'Your Question has been deleted successfully.');
    }
}
