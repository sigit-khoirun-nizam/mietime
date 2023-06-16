@extends('layouts.frontend.template')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
        <img src="{{url('uploads/post/' .$post->image)}}" alt="Gambar Berita" class="max-w-sm rounded-lg border bg-slate-200 p-2 mb-4">

        <p class="mb-3 text-gray-800">
            {!! $post->content !!}
        </p>

    </div>
</div>
@endsection
