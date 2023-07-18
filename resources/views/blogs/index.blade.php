<!-- resources/views/study-groups/index.blade.php -->

@extends('layouts.app')

@section('content')

<div class="p-4">
    <div>
        <div class="relative p-12 w-full sm:max-w-2xl sm:mx-auto">
            <div class="overflow-hidden z-0 rounded-full relative p-3">
                <form role="form" class="relative flex z-50 bg-white rounded-full" action="{{ route('blogs.index') }}" method="GET">
                    <input type="text" placeholder="search for an article here" name="search" value="{{ $search }}" class="rounded-full flex-1 px-6 py-4 text-gray-700 focus:outline-none">
                    <button class="bg-indigo-500 text-white rounded-full font-semibold px-8 py-4 hover:bg-indigo-400 focus:bg-indigo-600 focus:outline-none">Search</button>
                </form>
            </div>
        </div>
    </div>
    <hr>
        <div class="p-4">
            <a href="{{ route('blogs.create')}}">
                <button
                type="button"
                class="inline-block rounded-full border-2 border-primary px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-primary-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                data-te-ripple-init>
                Add your article
                </button>
            </a>
        </div>
    <hr>
    <br>
    <div>
    @if($blogs->isEmpty())
    <h4 style="text-align: center;" class="mb-2 mt-0 text-4xl font-medium leading-tight text-primary">No results found for your search.</h4>
    @else
    @foreach ($blogs as $blog)
    <div class="block rounded-lg bg-gray p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-300">
                    <div class="card-body">
                        <a href="{{ route('blogs.show', $blog) }}"><h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-800">{{ $blog->title }}</h5></a>
                        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-900">{{ $blog->publication_date }} </p>
                        @foreach ($blog->tags as $tag)
                            <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-primary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700">{{ $tag->name }}</span>
                        @endforeach
                    </div>
    </div>
    @endforeach
    @endif 
    </div>
</div>


    
@endsection
