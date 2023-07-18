<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Blog::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%');
        }

        $blogs = $query->with('author')->latest()->paginate(10);

        

        return view('blogs.index', compact('blogs', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();

        return view('blogs.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif',
            'tags' => 'required|array',
            'tags.*' => 'exists:tbl_tags,id', // Adjust validation rules as per your requirements
        ]);

        $Author = Auth::id();

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->author = $Author;
        $blog->publication_date = Carbon::today();

        

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('image')->store('product-images', 'public');
            $blog->featured_image = $imagePath;
        }

        // Save the blog post
        $blog->save();

        $tagIds = $request->input('tags');

        $blog->tags()->attach($tagIds);

        return redirect()->route('blogs.index')->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $author = User::findOrFail($blog->author);
        return view('blogs.show', compact('blog','author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif', // Adjust validation rules as per your requirements
        ]);

        $blog->title = $request->input('title');
        $blog->content = $request->input('content');

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('product-images', 'public');
            $blog->featured_image = $imagePath;
        }

        // Update the blog post
        $blog->save();

        return redirect()->route('blogs.show', $blog)->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog post deleted successfully.');
    }
}
