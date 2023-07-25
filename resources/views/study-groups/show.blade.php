<!-- resources/views/study-groups/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h2 class="mb-2 mt-0 text-4xl font-medium leading-tight text-primary">Study Group Details</h2>

    <div class="flex flex-col overflow-x-auto">
        <div class="sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Group Name</th>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $studyGroup->group_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-6 py-4">Group Description</th>
                                    <td class="whitespace-nowrap px-6 py-4" style="word-wrap: break-word;">{{ $studyGroup->description}}</td>

                                </tr>
                                <tr>
                                    <th scope="col" class="px-6 py-4">Category of the Study group </th>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $studyGroup->category->name  }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-6 py-4">Maximum number of members</th>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $studyGroup->max_members }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-6 py-4">Start date </th>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $studyGroup->start_date }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-6 py-4">End date</th>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $studyGroup->end_date }}</td>
                                </tr>
                        </thead>

                        @if ($studyGroup->isCreatedBy(Auth::user()))
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4">
                                        <a href="{{ route('study-groups.edit', $studyGroup->id) }}">
                                            <button
                                            type="button"
                                            class="inline-block rounded-full border-2 border-info px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-info transition duration-150 ease-in-out hover:border-info-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-info-600 focus:border-info-600 focus:text-info-600 focus:outline-none focus:ring-0 active:border-info-700 active:text-info-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                            data-te-ripple-init>
                                            Edit study group
                                            </button>
                                        </a>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                        <a href="{{ route('study-groups.members', $studyGroup) }}">
                                            <button
                                            type="button"
                                            class="inline-block rounded-full border-2 border-primary px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-primary-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                            data-te-ripple-init>
                                            View group members
                                            </button>
                                        </a>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                        <form action="{{ route('study-groups.destroy', $studyGroup->id) }}" method="post" id="delete-form">
                                        @csrf
                                        @method('DELETE')
                                            <button
                                            type="submit"
                                            class="inline-block rounded-full border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                            data-te-ripple-init>
                                            Delete Study group
                                            </button>
                                        </form>
                            </td>
                        </tr>
                        @else


                        @if ($isMember && $isApproved)
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4" colspan="2">
                                    <div class="alert alert-success">
                                    Congratulations! You are a member and your application has been approved.
                                    </div>
                                </td>
                            </tr>
                            
                        @elseif ($isMember && $isPending)
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4" colspan="2">
                                    <div class="alert alert-info">
                                        Thank you for your application. Please wait until your application is approved.
                                    </div>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4" colspan="2">
                                    <form action="{{ route('study-groups.join', $studyGroup) }}"  method="POST">
                                    @csrf
                                            <button
                                                type="submit"
                                                class="inline-block rounded-full border-2 border-info px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-info transition duration-150 ease-in-out hover:border-info-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-info-600 focus:border-info-600 focus:text-info-600 focus:outline-none focus:ring-0 active:border-info-700 active:text-info-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                                data-te-ripple-init>
                                                Apply to join
                                            </button>
                                    </form>
                                </td>
                            </tr>
                        @endif

                        <tr>
                            
                        </tr>
                        @endif
                        

                        <script>
                            document.getElementById('delete-form').addEventListener('submit', function(e){
                                e.preventDefault();
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: 'This action cannot be undone.',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#d33',
                                    cancelButtonColor: '#3085d6',
                                    confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // If confirmed, submit the form
                                        this.submit();
                                    }
                                });
                            });
                        </script>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
