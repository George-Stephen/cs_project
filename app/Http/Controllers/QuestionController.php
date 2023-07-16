<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $questions = Question:: withCount('answers');
        if ($search) {
            $questions->where('title', 'LIKE', "%{$search}%")
                ->orWhere('body', 'LIKE', "%{$search}%");
        }
        $questions = $questions->paginate(10);
        return view('question_module.index', compact('questions', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('question_module.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => ['required',
                Rule::unique('tbl_questions')->where(function ($query) use ($request) {
                    return $query->where('title', $request->title);
                }),
            ],
            'body' => 'required',
            'tags' => 'required|array',
            'tags.*' => 'exists:tbl_tags,id',
            
        ]);
        $question =  Question::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'asked_by' => Auth::id(),
        ]);

        $tagIds = $request->input('tags');

        $question->tags()->attach($tagIds);

        return redirect()->route('questions.index')->with('success', 'Question created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question::with('answers')->find($id);
        $numAnswers = $question->answers->count();
        return view('question_module.show', compact('question','numAnswers')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::findOrFail($id);

        return view('question_module.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $question = Question::findOrFail($id);
        
        $request-> validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        $question->title = $request->input('title');
        $question->body = $request->input('body');
        $question->save();
        return redirect() -> route('questions.index') ->with('success', 'Your Question has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Your Question has been deleted successfully.');
    }

    public function upvote(Request $request, $id)
    {
        $question= Question::findOrFail($id);
        $question->increment('upvotes');
        return redirect()->back();
    }

    public function downvote(Request $request, $id)
    {
        // Logic to add a downvote for the question or answer
        $question= Question::findOrFail($id);
        $question->increment('downvotes');
        return redirect()->back();
    }
    
}
