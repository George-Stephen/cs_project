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
        <form action="{{ route('study-groups.update', $studyGroup->id)  }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="group_name">Group Name:</label>
                <input type="text" class="block mt-1 w-full" name="group_name" id="group_name" class="form-control"  value="{{ $studyGroup->group_name }}">
            </div>

            <div class="form-group">
                <label for="group_course">Group Course:</label>
                <input type="text" class="block mt-1 w-full" name="group_course" id="group_course" class="form-control" required value="{{ $studyGroup->group_course }}">
            </div>

            <div class="form-group">
                <label for="group_link">Group Link:</label>
                <input type="text" class="block mt-1 w-full" name="group_link" id="group_link" class="form-control" required value="{{ $studyGroup->group_link}}">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control block mt-1 w-full" required>{{ $studyGroup->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="max_members">Maximum members:</label>
                <input type="text" class="block mt-1 w-full" name="max_members" id="max_members" class="form-control" required value="{{ $studyGroup->max_members }}">
            </div>

            <!-- Add any other form fields as needed -->
            <br>

            <button type="submit" class="dark:active:shadow-[0_8px_9px_-4px_rgba
            (59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]] inline-block w-full rounded
             bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-
             [0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-
             [0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba
             (59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">Update Study Group</button>
        </form>
    </x-authentication-card>
@endsection
