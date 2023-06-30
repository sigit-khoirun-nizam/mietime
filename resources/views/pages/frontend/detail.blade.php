@extends('layouts.frontend.template')

@section('content')
<section class="pt-16 pb-32 bg-slate-100">
    <div class="container mx-auto p-4">
        <div class="max-w-lg mx-auto">
            <h1 class="text-3xl font-bold mt-4 mb-4">{{ $post->title }}</h1>
            <img src="{{url('uploads/post/' .$post->image)}}" alt="Gambar Berita" class="w-full h-auto rounded">
            <div class="mt-4">
                <p class="text-gray-700">Deskripsi</p>
                <p class="text-gray-700">{!! $post->content !!}</p>
            </div>
        </div>
    </div>
</section>
@endsection
