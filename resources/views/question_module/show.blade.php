@extends('layouts.app')

@section('content')

<div class="p-4">
    <div class="block rounded-lg bg-gray p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-300">
        <div class="card-body">
            <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-800">{{ $question->title }}</h5>
                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-900">{{ $question->body }}</p>
                    @foreach ($question->tags as $tag)
                        <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-primary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700">{{ $tag->name }}</span>
                    @endforeach
                    @if ($question->isAskedBy(Auth::user()))
                    <div class="flex">
                        <div class="w-1/3"></div>
                        <div class="w-1/2">
                            <a href="{{ route('questions.edit', $question) }}">
                                <button
                                    type="button"
                                    class="inline-block rounded-full border-2 border-info px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-info transition duration-150 ease-in-out hover:border-info-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-info-600 focus:border-info-600 focus:text-info-600 focus:outline-none focus:ring-0 active:border-info-700 active:text-info-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                    data-te-ripple-init>
                                    Edit your question
                                </button>
                            </a>
                        </div>
                        <div class="w-1/2">
                            <form action="{{ route('questions.destroy', $question) }}" method="post" id="delete-form">
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
                    @else
                    <div class="flex">
                        <div class="w-1/3">
                            <p class="text-center text-lg font-bold">Upvotes</p>
                            <p class="text-center text-3xl font-bold">{{ $question->upvotes}}</p>
                            <div class="flex justify-center">
                                <form action="{{ route('questions.upvote', ['question' => $question->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                    class="inline-block rounded-full border-2 border-success px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-success transition duration-150 ease-in-out hover:border-success-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-success-600 focus:border-success-600 focus:text-success-600 focus:outline-none focus:ring-0 active:border-success-700 active:text-success-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                    data-te-ripple-init
                                    >Like</button>
                                </form>
                            </div>
                        </div>
                        <div class="w-1/3">
                            <p class="text-center text-lg font-bold">Downvotes</p>
                            <p class="text-center text-3xl font-bold">{{ $question->downvotes}}</p>
                            <div class="flex justify-center">
                                <form action="{{ route('questions.downvote', ['question' => $question->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" 
                                    class="inline-block rounded-full border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                    data-te-ripple-init>Dislike</button>
                                </form>
                            </div>
                        </div>
                        <div class="w-1/3">
                            <p class="text-center text-3x1 font-bold">Asked by</p>
                            <p class="text-center text-lg font-bold">{{ $question->user->full_name }}</p>
                        </div>
                    </div> 
                    @endif
                     
        </div>
    </div>
    <!-- <end of question> -->
    <br>
    <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-800">
    @if($numAnswers > 0)
        @if ($numAnswers == 1)
            {{ $numAnswers }} Answer
        @else
            {{ $numAnswers }} Answers
        @endif
    @else
        No Answers Yet
    @endif
    </h5>
    @foreach ($question->answers as $answer)
    <div class="block rounded-lg bg-gray p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-300">
        <div class="card-body">
            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-900">{{ $answer->body }}</p>
            @if ($answer->isAnsweredBy(Auth::user()))
                    <div class="flex">
                        <div class="w-1/3"></div>
                        <div class="w-1/2">
                            <a href="{{ route('answers.edit', $answer) }}">
                                <button
                                    type="button"
                                    class="inline-block rounded-full border-2 border-info px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-info transition duration-150 ease-in-out hover:border-info-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-info-600 focus:border-info-600 focus:text-info-600 focus:outline-none focus:ring-0 active:border-info-700 active:text-info-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                    data-te-ripple-init>
                                    Edit your answer
                                </button>
                            </a>
                        </div>
                        <div class="w-1/2">
                            <form action="{{ route('answers.destroy', $answer) }}" method="post" id="delete-form">
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
                    @else
                    <div class="flex">
                        <div class="w-1/3">
                            <p class="text-center text-lg font-bold">Upvotes</p>
                            <p class="text-center text-3xl font-bold">{{ $answer->upvotes}}</p>
                            <div class="flex justify-center">
                                <form action="{{ route('answers.upvote', ['answer' => $answer->id])}}" method="POST">
                                    @csrf
                                    <button type="submit"
                                    class="inline-block rounded-full border-2 border-success px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-success transition duration-150 ease-in-out hover:border-success-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-success-600 focus:border-success-600 focus:text-success-600 focus:outline-none focus:ring-0 active:border-success-700 active:text-success-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                    data-te-ripple-init
                                    >Like</button>
                                </form>
                            </div>
                        </div>
                        <div class="w-1/3">
                            <p class="text-center text-lg font-bold">Downvotes</p>
                            <p class="text-center text-3xl font-bold">{{ $answer->downvotes}}</p>
                            <div class="flex justify-center">
                                <form action="{{ route('answers.downvote', ['answer' => $answer->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" 
                                    class="inline-block rounded-full border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                    data-te-ripple-init>Dislike</button>
                                </form>
                            </div>
                        </div>
                        <div class="w-1/3">
                            <p class="text-center text-3x1 font-bold">Responded by</p>
                            <p class="text-center text-lg font-bold">{{ $answer->user->full_name }}</p>
                        </div>
                    </div>  
                    @endif
                 
        </div>
    </div>
    <br>
    @endforeach
    <br>
    <div class="block rounded-lg bg-gray p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-300">
        <div class="card-body">
            <h2 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-800">Your Answer:</h2> 
            <form action="{{ route('answers.store', $question) }}" method="POST">
                @csrf

                <div class="form-group">
                    <textarea name="body" id="body" class="form-control w-full px-4 py-2 border border-gray-300 rounded-lg" rows="5" required></textarea>
                </div>
                
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <br>
                <button type="submit" class="w-100 h-30 inline-block rounded-full border-2 border-success px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-success transition duration-150 ease-in-out hover:border-success-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-success-600 focus:border-success-600 focus:text-success-600 focus:outline-none focus:ring-0 active:border-success-700 active:text-success-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
            data-te-ripple-init>Submit Answer</button>
            </form>  
    </div>
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
</div>
@endsection
