<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        
        $blogs = Blog::where('title', 'like', '%' . $query . '%')
                    ->orWhere('content', 'like', '%' . $query . '%')
                    ->latest()
                    ->paginate(10)
                    ->get();

        return view('blogs.index', compact('blogs', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as per your requirements
        ]);

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $blog->featured_image = 'storage/images/' . $imageName;
        }

        // Save the blog post
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
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
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as per your requirements
        ]);

        $blog->title = $request->input('title');
        $blog->content = $request->input('content');

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $blog->featured_image = 'storage/images/' . $imageName;
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
