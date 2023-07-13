<!-- resources/views/study-groups/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h2 class="mb-2 mt-0 text-4xl font-medium leading-tight text-primary">Study Group Details</h2>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                <th scope="col" class="px-6 py-4">Group Name</th>
                                <th scope="col" class="px-6 py-4">Group Course</th>
                                <th scope="col" class="px-6 py-4">Group Description</th>
                                <th scope="col" class="px-6 py-4">Join link</th>
                                <th scope="col" class="px-6 py-4">Maximum number of members</th>
                                </tr>
                        </thead>
                        <tr >
                            <td class="whitespace-nowrap px-6 py-4">{{ $studyGroup->group_name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $studyGroup->group_course }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $studyGroup->description}}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $studyGroup->group_link }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $studyGroup->max_members }}</td>
                        </tr>
                        <!-- Add additional table rows for more study group details -->
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
