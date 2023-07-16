<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $answers = Answer::latest()->paginate(10);

        return view('answer_module.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('questio-module.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request ->validate(
            [
                'body' => 'required',
                'question_id' => 'required|exists:tbl_questions,id',
            ]
        );

        $answer = new Answer();
        $answer->body = $validatedData['body'];
        $answer->question_id = $validatedData['question_id'];
        $answer->answered_by = Auth::id();

        $answer->save();

        return redirect()->route('questions.index')->with('success', 'Question created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $answer = Answer::findOrFail($id);

        return view('answer-module.show', compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $answer = Answer::findOrFail($id);

        return view('answer-module.edit', compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request -> validate(
            [
                'body' => 'required',
                'question_id' => 'required',
                'upvotes' => 'required',
                'downvotes' => 'required',
                'answered_by' => Auth::user()->id,
            ]
        );

        Answer::findOrFail($id) -> update($validatedData);
        return redirect() -> route('question-module.index')-> with('Success','Your answer has been successfully updated' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $answer = Answer::findOrFail($id);
        $answer->delete();

        return redirect()->route('answer-module.index')->with('success', 'Your Answer has been deleted successfully.');
    }
    public function upvote(Answer $answer)
    {
        $answer->increment('upvotes');

        return redirect()->back();
    }

    public function downvote(Answer $answer)
    {
        $answer->increment('downvotes');

        return redirect()->back();
    }
}
