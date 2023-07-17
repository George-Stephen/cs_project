<!-- resources/views/study-groups/index.blade.php -->

@extends('layouts.app')

@section('content')

<div class="p-4">
    <div>
        <div class="relative p-12 w-full sm:max-w-2xl sm:mx-auto">
            <div class="overflow-hidden z-0 rounded-full relative p-3">
                <form role="form" class="relative flex z-50 bg-white rounded-full" action="{{ route('questions.index') }}" method="GET">
                    <input type="text" placeholder="search for a product here" name="search" class="rounded-full flex-1 px-6 py-4 text-gray-700 focus:outline-none">
                    <button class="bg-indigo-500 text-white rounded-full font-semibold px-8 py-4 hover:bg-indigo-400 focus:bg-indigo-600 focus:outline-none">Search</button>
                </form>
            </div>
        </div>
    </div>
    <hr>
        <div class="p-4">
            <a href="{{ route('products.create')}}">
                <button
                type="button"
                class="inline-block rounded-full border-2 border-primary px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-primary-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                data-te-ripple-init>
                Add your product
                </button>
            </a>
            <p><span class="text-lg font-medium">{{ $productCount }}</span> products found </p>
        </div>
    <hr>
    <br>
    <div class="grid grid-cols-4 gap-4">
    @foreach ($products as $product)
        <div class="bg-white rounded-lg shadow-md p-4">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" />
            <h3 class="text-lg font-semibold">{{ $product->title }}</h3>
            <p class="text-lg font-medium">Price: Ksh.{{ $product->price }}</p>
        <!-- Additional product information -->
            <a href="{{ route('products.show', $product->id) }}" class="btn">
                <button type="button"
                class="w-50 h-50 inline-block rounded-full border-2 border-info px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-info transition duration-150 ease-in-out hover:border-info-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-info-600 focus:border-info-600 focus:text-info-600 focus:outline-none focus:ring-0 active:border-info-700 active:text-info-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                data-te-ripple-init>
                View more
                </button>
            </a>
        </div>
    @endforeach
    </div>
</div>


    
@endsection
