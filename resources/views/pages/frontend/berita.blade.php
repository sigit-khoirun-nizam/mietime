@extends('layouts.frontend.template')

@section('content')

<!-- Container for demo purpose -->
<div class="container my-16 mx-auto md:px-6">
    <!-- Section: Design Block -->
    <section class="mb-32 text-center">
        <h2 class="mb-12 text-center text-3xl font-bold">Berita</h2>

        <div class="grid gap-6 lg:grid-cols-3 xl:gap-x-12">

            @forelse ($posts as $key => $post)
            <div class="mb-6 lg:mb-0">
                <div class="relative mb-6 overflow-hidden rounded-lg bg-cover bg-no-repeat shadow-lg dark:shadow-black/20"
                    data-te-ripple-init data-te-ripple-color="light">
                    <img src="{{url('uploads/post/' .$post->image)}}" class="w-full" alt="Louvre" />
                    <a href="{{url('berita/'.$post->slug)}}">
                        <div
                            class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100 bg-[hsla(0,0%,98.4%,.15)]">
                        </div>
                    </a>
                </div>

                <h5 class="mb-3 text-lg font-bold">{{$post->title}}</h5>
                <div class="pt-3">
                    <a href="{{url('berita/'.$post->slug)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none ">Read more</a>
                </div>
            </div>
            @empty
                <p class="my-4">
                    No Post Available
                </p>
            @endforelse

        </div>
    </section>
    <!-- Section: Design Block -->
</div>
<!-- Container for demo purpose -->

@endsection
