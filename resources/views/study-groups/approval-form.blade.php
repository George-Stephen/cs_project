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
            <h5 class="card-title">Study Group Application Approval</h5>

            <p class="card-text">You are reviewing an application to join the study group "{{ $studyGroup->group_name }}".</p>

            <h6 class="card-subtitle mb-2 text-muted">Applicant Details:</h6>
            <ul class="list-group">
            <li class="list-group-item"><strong>Name:</strong> {{ $applicant->full_name }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $applicant->email }}</li>
            <!-- Include any additional applicant details here -->
            </ul>
        <form method="POST" action="{{ route('study-groups.approve', ['studyGroup' => $studyGroup, 'applicant' => $applicant]) }}" style="text-align: center;">
            @csrf
            @method('PUT')

            <!-- Include other form fields here -->

            @if (!Auth::check() || !Auth::user()->is($groupCreator))
                <p>You must be the group creator to approve this application.</p>
                <p>Please <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a> and login as the group creator.</p>
            @else
                <button type="submit" class="dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]] inline-block w-full rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">Approve Application</button>
            @endif
        </form>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    </x-authentication-card>
@endsection
