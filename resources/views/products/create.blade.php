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
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="seller_id" value="{{ Auth::id() }}"> <!-- Hidden field for creator ID -->
            
            <div class="form-group">
                <label for="title" class="block font-semibold text-gray-700">Title:</label>
                <input type="text" class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" name="title" id="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="category" class="block font-semibold text-gray-700">Product category:</label>
                <select name="category" id="category" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                    <option value="">Select Category</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Clothing & Fashion">Clothing & Fashion</option>
                    <option value="Health & Beauty">Health & Beauty</option>
                    <option value="Sports & Outdoors">Sports & Outdoors</option>
                    <option value="Books & Stationery">Books & Stationery</option>
                    <option value="Automotive">Automotive</option>
                    <!-- Add more categories as needed -->
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="block font-semibold text-gray-700">Image:</label>
                <input type="file" name="image" id="image" required class="w-full">
            </div>

            <div class="form-group">
                <label for="price" class="block font-semibold text-gray-700">Price:</label>
                <input type="number" class="form-control block px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" name="price" id="price" class="form-control" required step="0.01">
            </div>

            <div class="form-group">
                <label for="description" class="block font-semibold text-gray-700">Description:</label>
                <textarea name="description" id="description" class="form-control block mt-1 w-full  px-3 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:border-blue-500" required></textarea>
            </div>

            <div class="form-group">
                <label for="condition" class="block font-semibold text-gray-700">Condition:</label>
                <select name="condition" id="condition" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                    <option value="">Select condition</option>
                    <option value="New">New</option>
                    <option value="Used">Used</option>
                    <option value="Refurbished">Refurbished</option>
                    <!-- Add more categories as needed -->
                </select>
            </div>

            <div class="form-group">
                <label for="availability" class="block font-semibold text-gray-700">Availability:</label>
                <select name="availability" id="availability" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                    <option value="">Select availability</option>
                    <option value="Currently available">Currently available</option>
                    <option value="Few units remaining">Few units remaining</option>
                    <option value="Out of Stock">Out of Stock</option>
                    <!-- Add more categories as needed -->
                </select>
            </div>

            <div class="form-group">
                <label for="description" class="block font-semibold text-gray-700">Additional Info:</label>
                <textarea name="additional_info" id="additional_info" class="form-control block mt-1 w-full  px-3 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:border-blue-500" required></textarea>
            </div>

            <!-- Add any other form fields as needed -->
            <br>

            <button type="submit" class="dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]] inline-block w-full rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                Create product
            </button>
        </form>
    </x-authentication-card>
    <br>
@endsection
