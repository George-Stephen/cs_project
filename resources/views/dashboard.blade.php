@extends('layouts.app')

@section('content')
    <div
            id="carouselExampleControls"
            class="relative"
            data-te-carousel-init
            data-te-carousel-slide>
            <!--Carousel items-->
            <div
                class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                <!--First item-->
                <div
                class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-item
                data-te-carousel-active>
                    <img
                    src="https://tecdn.b-cdn.net/img/Photos/Slides/img%20(22).jpg"
                    class="h-auto max-w-full"
                    alt="Wild Landscape" />
                    <div
                        class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                        <h5 class="text-xl">Welcome to Omniverse,our School Integrated Information System!</h5>
                        <p>
                            Where you can ask questions and get answers from the school community. Collaborate with students, teachers, and administrators to find solutions and expand your knowledge.
                        </p>
                    </div>
                </div>
                <!--Second item-->
                <div
                class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-item>
                    <img
                        src="https://tecdn.b-cdn.net/img/Photos/Slides/img%20(23).jpg"
                        class="h-auto max-w-full"
                        alt="Camera" />
                    <div
                        class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                        <h5 class="text-xl">Collaborate in Study Groups</h5>
                        <p>
                        ,Join study groups with fellow students to enhance your learning experience, exchange knowledge, and discuss challenging topics.
                        </p>
                    </div>
                </div>
                <!--Third item-->
                <div
                class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-item>
                    <img
                    src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp"
                    class="h-auto max-w-full"
                    alt="Exotic Fruits" />
                    <div
                        class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                        <h5 class="text-xl">Stay Informed with Latest Updates</h5>
                        <p>
                        ,Read insightful articles, news, and updates about the school, education, and related topics. Gain valuable insights, stay up-to-date, and engage with the school community,
                        </p>
                    </div>
                </div>
                <!--Fourth item-->
                <div
                class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-item>
                    <img
                        src="https://tecdn.b-cdn.net/img/Photos/Slides/img%20(15).jpg"
                        class="h-auto max-w-full"
                        alt="Camera" />
                    <div
                        class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                        <h5 class="text-xl">Shop Conveniently at Our Online Market</h5>
                        <p>
                            and find educational resources, textbooks, stationery, and more in our online market module. Purchase or sell items within our school community.
                        </p>
                    </div>
                </div> 
            </div>

            <!--Carousel controls - prev item-->
            <button
                class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                type="button"
                data-te-target="#carouselExampleControls"
                data-te-slide="prev">
                <span class="inline-block h-8 w-8">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-6 w-6">
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                </span>
                <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
                >Previous</span
                >
            </button>
            <!--Carousel controls - next item-->
            <button
                class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                type="button"
                data-te-target="#carouselExampleControls"
                data-te-slide="next">
                <span class="inline-block h-8 w-8">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-6 w-6">
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                </span>
                <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
                >Next</span
                >
            </button>
    </div>
    <div>
        <div class="relative p-12 w-full sm:max-w-2xl sm:mx-auto">
            <div class="overflow-hidden z-0 rounded-full relative p-3">
                <form role="form" class="relative flex z-50 bg-white rounded-full" action="{{ route('questions.index') }}" method="GET">
                    <input type="text" placeholder="enter your question here" name="search" class="rounded-full flex-1 px-6 py-4 text-gray-700 focus:outline-none">
                    <button class="bg-indigo-500 text-white rounded-full font-semibold px-8 py-4 hover:bg-indigo-400 focus:bg-indigo-600 focus:outline-none">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="p-4">
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-200 p-4">
            <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-800">Latest study groups</h5>

            @foreach ($studyGroups as $studyGroup)
            <div class="block rounded-lg bg-gray p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-300">
                    <div class="card-body">
                        <div class="flex">
                            <div class="flex-1 flex items-center justify-center">
                                <div>
                                    <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/study-group-3731946-3151744.png" alt="" class="w-20 h-20 rounded-full">  
                                </div>
                            </div>
                            <div class="flex-1 text-center justify-center">
                                <br>
                                <p class=" text-xl font-bold">{{ $studyGroup->group_name }}</p>
                                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-900">{{ $studyGroup->category->name }}</p>

                            </div>
                            <div class="flex-1 flex items-center justify-center">
                                <a href="{{ route('study-groups.show', $studyGroup->id) }}">
                                    <button
                                    type="button"
                                    class=" w-35 h-35 inline-block rounded-full border-2 border-primary px-6 pb-[6px] pt-2
                                     text-xs font-medium uppercase leading-normal
                                     text-primary transition duration-150 ease-in-out 
                                     hover:border-primary-600 hover:bg-neutral-500 hover:bg-opacity-10
                                      hover:text-primary-600 focus:border-primary-600 focus:text-primary-600
                                       focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700
                                        dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                        data-te-ripple-init>
                                        View details
                                    </button>
                                </a>
                            </div>
                        </div>
                        
                    </div>
            </div>
            @endforeach    
            </div>
            <div class="bg-gray-200 p-4">
            <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-800">Latest articles</h5>
            @foreach ($blogs as $blog)
                <div class="block rounded-lg bg-gray p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-300">
                <a href="{{ route('blogs.show', $blog) }}"><h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-800">{{ $blog->title }}</h5></a>
                            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-900">{{ $blog->publication_date }} </p>
                            @foreach ($blog->tags as $tag)
                                <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-primary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700">{{ $tag->name }}</span>
                            @endforeach
                </div>
                <br>
            @endforeach
            </div>
        </div>
    </div>
    <hr>
    <!--Footer container-->
@endsection