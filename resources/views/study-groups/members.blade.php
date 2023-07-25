<!-- resources/views/study-groups/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h2 class="mb-2 mt-0 text-4xl font-medium leading-tight text-primary"><u>Members of {{ $studyGroup->group_name }}</u></h2>

    <div class="flex flex-col overflow-x-auto">
        <div class="sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-x-auto">
                    <!-- Display search results -->
                    <div>
                        <div class="relative p-12 w-full sm:max-w-2xl sm:mx-auto">
                            <div class="overflow-hidden z-0 rounded-full relative p-3">
                                <form role="form" class="relative flex z-50 bg-white rounded-full" action="{{ route('study-groups.members', $studyGroup->id)  }}" method="GET">
                                    <input type="text" placeholder="enter your search here" name="search" value="{{ $search }}" placeholder="Search members..." class="rounded-full flex-1 px-6 py-4 text-gray-700 focus:outline-none">
                                    <button class="bg-indigo-500 text-white rounded-full font-semibold px-8 py-4 hover:bg-indigo-400 focus:bg-indigo-600 focus:outline-none">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if ($members->isEmpty())
                        <h4 style="text-align: center;" class="mb-2 mt-0 text-4xl font-medium leading-tight text-primary">No members found.</h4>
                    @else
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Member ID</th>
                                    <th scope="col" class="px-6 py-4">Full Name</th>
                                    <th scope="col" class="px-6 py-4">Email Address</th>
                                    <th scope="col" class="px-6 py-4">Phone number</th>
                                    
                                    <!-- Add more table headers for additional columns if needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                    <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-50 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $member->id }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $member->full_name }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $member->email }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $member->phone }}</td>
                                        
                                        <!-- Display additional columns as needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $members->links() }} <!-- Display pagination links -->
                    @endif      
                </div>
            </div>
        </div>
    </div>
@endsection
