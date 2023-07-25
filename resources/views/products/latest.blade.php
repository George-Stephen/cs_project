<!-- resources/views/study-groups/index.blade.php -->

@extends('layouts.app')

@section('content')

<div class="p-4">
    <div class="grid grid-cols-3 gap-4">
    @foreach ($products as $product)
        <div class="bg-white rounded-lg shadow-md p-4">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" />
            <h3 class="text-lg font-semibold">{{ $product->title }}</h3>
            <p>{{ $product->description }}</p>
            <p>Price: {{ $product->price }}</p>
        <!-- Additional product information -->
            <a href="{{ route('products.show', $product->id) }}" class="btn">
                <button type="button"
                class="inline-block rounded-full border-2 border-info px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-info transition duration-150 ease-in-out hover:border-info-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-info-600 focus:border-info-600 focus:text-info-600 focus:outline-none focus:ring-0 active:border-info-700 active:text-info-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                data-te-ripple-init>
                View more
                </button>
            </a>
        </div>
    @endforeach
    </div>
</div>
    
@endsection
