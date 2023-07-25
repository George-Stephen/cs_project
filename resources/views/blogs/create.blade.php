<!-- resources/views/study-groups/create.blade.php -->

@extends('layouts.app')

@section('content')
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>
        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="seller_id" value="{{ Auth::id() }}"> <!-- Hidden field for creator ID -->
            
            <div class="form-group">
                <label for="title" class="block font-semibold text-gray-700">Title:</label>
                <input type="text" class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" name="title" id="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="tags" class="block font-semibold text-gray-700">Tags:</label>
                <select name="tags[]" id="tags" class="form-control block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" multiple required >
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="featured_image" class="block font-semibold text-gray-700">Featured Image:</label>
                <input type="file" name="featured_image" id="featured_image" class="w-full">
            </div>


            <div class="form-group">
                <label for="content" class="block font-semibold text-gray-700">Content:</label>
                <textarea name="content" id="content" class="form-control block mt-1 w-full  px-3 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:border-blue-500" required></textarea>
            </div>

            <!-- Add any other form fields as needed -->
            <br>

            <button type="submit" class="dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]] inline-block w-full rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                Create post
            </button>
        </form>
    </x-authentication-card>
    <br>
@endsection
