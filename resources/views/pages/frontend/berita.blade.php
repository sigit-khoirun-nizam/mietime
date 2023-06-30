@extends('layouts.frontend.template')

@section('content')

<section id="blog" class="pt-16 pb-32 bg-slate-100">
    <div class="container">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h2 class="font-semibold text-red-500 text-2xl mb-4 sm:text-3xl lg:text-4xl">Berita Terkini</h2>
                <p class="font-medium text-md text-slate-500 md:text-lg">Berikut adalah postingan dari kami</p>
            </div>
        </div>

        <div class="flex flex-wrap justify-center">
            @forelse ($posts as $key => $post)
            <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10">
                    <img src="{{url('uploads/post/' .$post->image)}}" alt="" class="w-full max-h-60">
                    <div class="py-8 px-6">
                        <h3>
                            <a href="#" class="block mb-10 font-semibold text-xl text-dark hover:text-red-500 truncate">{{$post->title}}</a>
                        </h3>
                        <a href="{{url('berita/'.$post->slug)}}" class="font-medium text-sm text-white bg-red-500 py-2 px-4 rounded-lg hover:opacity-80">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @empty
                <p class="my-4">
                    No Post Available
                </p>
            @endforelse
        </div>
    </div>
</section>

@endsection
