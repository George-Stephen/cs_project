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
        <form action="{{ route('questions.store') }}" method="POST">
            @csrf

            <input type="hidden" name="creator_id" value="{{ Auth::id() }}"> <!-- Hidden field for creator ID -->
            
            <div class="form-group">
                <label for="title">Question Title:</label>
                <input type="text" class="block mt-1 w-full" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="body">Question description:</label>
                <textarea name="body" id="body"  class="form-control block mt-1 w-full" required></textarea>
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" id="tags" class="form-control block mt-1 w-full" multiple required >
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Add any other form fields as needed -->
            <br>

            <button type="submit" class="dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]] inline-block w-full rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                Submit your question</button>
        </form>
    </x-authentication-card>
@endsection
