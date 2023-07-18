@extends('layouts.app')

@section('content')

<div class="p-4">
    <div class="text-center">
        <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-800">{{ $blog->title }}</h5>
        @foreach ($blog->tags as $tag)
            <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-primary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700">{{ $tag->name }}</span>
        @endforeach
        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-900">Published by : {{ $author->full_name }}</p>
        
        
        @if ($blog->featured_image)
        <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="Featured Image" style="width: 100%; height: 700px; border-radius: 10px;" >
        @endif
        <div class="blog-content">
                {!! $blog->content !!}
        </div>
        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-900">Published on :  {{ $blog->publication_date }} </p>
        @if ($author==Auth::user())
                    <div class="flex">
                        <div class="w-1/2">
                            <a href="{{ route('blogs.edit', $blog) }}">
                                <button
                                    type="button"
                                    class="inline-block rounded-full border-2 border-info px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-info transition duration-150 ease-in-out hover:border-info-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-info-600 focus:border-info-600 focus:text-info-600 focus:outline-none focus:ring-0 active:border-info-700 active:text-info-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                    data-te-ripple-init>
                                    Edit your question
                                </button>
                            </a>
                        </div>
                        <div class="w-1/2">
                            <form action="{{ route('blogs.destroy', $blog) }}" method="post" id="delete-form">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="inline-block rounded-full border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                    data-te-ripple-init>
                                    Delete your question
                                    </button>
                            </form>
                        </div>
                    </div> 
                    @endif
    </div>
</div>
@endsection
