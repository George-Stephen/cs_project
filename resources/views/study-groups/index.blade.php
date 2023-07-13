<!-- resources/views/study-groups/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h2 class="mb-2 mt-0 text-4xl font-medium leading-tight text-primary"><u>All study groups</u></h2>

    <div class="flex flex-col overflow-x-auto">
        <div class="sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-x-auto">
                    <a href="{{ route('study-groups.create')}}">
                    <button
                        type="button"
                        class="inline-block rounded-full border-2 border-primary px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-primary-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                        data-te-ripple-init>
                        Create new study group
                    </button>
                    </a>
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Group ID</th>
                                <th scope="col" class="px-6 py-4">Group Name</th>
                                <th scope="col" class="px-6 py-4">Group Course</th>
                                <th scope="col" class="px-6 py-4">Group Description</th>
                                <th scope="col" class="px-6 py-4">Action</th>
                                <!-- Add more table headers for additional columns if needed -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studyGroups as $studyGroup)
                                <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $studyGroup->id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $studyGroup->group_name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $studyGroup->group_course }}</td>
                                    <td class="whitespace-nowrap px-6 py-4" style="word-wrap: break-word;">{{ $studyGroup->description}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <a href="{{ route('study-groups.show', $studyGroup->id) }}">
                                            <button
                                            type="button"
                                            class="inline-block rounded-full border-2 border-info px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-info transition duration-150 ease-in-out hover:border-info-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-info-600 focus:border-info-600 focus:text-info-600 focus:outline-none focus:ring-0 active:border-info-700 active:text-info-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                            data-te-ripple-init>
                                            Learn more
                                            </button>
                                        </a>
                                    </td>
                                    <!-- Display additional columns as needed -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
