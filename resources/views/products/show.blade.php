@extends('layouts.app')

@section('content')
<div class="p-4">
    <div class="block rounded-lg bg-gray p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-300">
            <div class="flex">
                <div class="w-1/3" >
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" style="width: 350px; height: 250px; border-radius: 10px;" />
                </div>
                <div class="w-2/3">
                    <h2 class="text-3xl font-bold">{{ $product->title }}</h2>
                    <br>
                    <span>Category : </span><span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-primary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700">{{ $product->category }}</span>
                    <br>
                    <span>Availability : </span><span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-primary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700">{{ $product->availability }}</span>
                    <br>
                    <span>Condition : </span><span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-primary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700">{{ $product->condition }}</span>
                    <br>
                    <br>
                    <hr>
                    <br>
                    <h4 class="text-lg font-medium">Price: Ksh.{{ $product->price }}</h4>
                    <br>
                    @if (Auth::check() && $product->seller_id === Auth::id())
                    <!-- Current user is the seller -->
                    <div class="flex">
                        <div class="w-1/2">
                            <a href="{{ route('products.edit', $product->id) }}">
                                <button
                                    type="button"
                                    class="inline-block rounded-full border-2 border-info px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-info transition duration-150 ease-in-out hover:border-info-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-info-600 focus:border-info-600 focus:text-info-600 focus:outline-none focus:ring-0 active:border-info-700 active:text-info-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                    data-te-ripple-init>
                                    Edit Product
                                </button>
                            </a>
                        </div>
                        <div class="w-1/2">
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;" id="delete-form">
                            @csrf
                            @method('DELETE')
                                <button
                                    type="submit"
                                    class="inline-block rounded-full border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                    data-te-ripple-init>
                                    Delete Product
                                    </button>
                            </form>
                        </div>
                    </div>
                    @else
                    <!-- Current user is not the seller -->
                    <a href="{{ route('products.requestToBuy', $product->id) }}" >
                        <button
                            type="button"
                            class="inline-block rounded-full border-2 border-primary px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-primary-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                            data-te-ripple-init>
                            Request to Buy
                        </button>
                    </a>
                    @endif
                </div>
            </div>
    </div>
    <br>
    <div class="block rounded-lg bg-gray p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-300">
        <h2 class="text-2xl font-bold">Product details</h2>
        <hr>
        <p class="text-base font-medium">{{ $product->description }}</p>
        <p class="text-base font-normal">{{ $product->additional_information }}</p>
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
