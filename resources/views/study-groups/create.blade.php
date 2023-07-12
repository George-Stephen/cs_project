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
                <input type="text" class="block mt-1 w-full" name="group_name" id="group_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="group_course">Group Course:</label>
                <input type="text" class="block mt-1 w-full" name="group_course" id="group_course" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="group_link">Group Link:</label>
                <input type="text" class="block mt-1 w-full" name="group_link" id="group_link" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="max_members">Maximum members:</label>
                <input type="text" class="block mt-1 w-full" name="max_members" id="max_members" class="form-control" required>
            </div>

            <!-- Add any other form fields as needed -->

            <button type="submit" class="btn btn-primary">Create Study Group</button>
        </form>
    </x-authentication-card>
@endsection
