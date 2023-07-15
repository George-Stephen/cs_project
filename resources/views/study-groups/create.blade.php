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
        <form action="{{ route('study-groups.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="group_name">Group Name:</label>
                <input type="text" class="block mt-1 w-full" name="group_name" id="group_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="group_course">Group Course:</label>
                <input type="text" class="block mt-1 w-full" name="group_course" id="group_course" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="group_link">Group Link:</label>
                <input type="text" class="block mt-1 w-full" name="group_link" id="group_link" class="form-control" required >
            </div>

            

            <div class="form-group">
                <label for="category">Group category:</label>
                <select name="category_id" id="category" class="form-control block mt-1 w-full">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="max_members">Maximum members:</label>
                <input type="number" class="form-control block mt-1 w-full" name="max_members" id="max_members" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control block mt-1 w-full">
            </div>

            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control block mt-1 w-full">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control block mt-1 w-full" required></textarea>
            </div>

            <!-- Add any other form fields as needed -->
            <br>

            <button type="submit" class="dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]] inline-block w-full rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">Create Study Group</button>
        </form>
    </x-authentication-card>
@endsection
