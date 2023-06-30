@extends('layouts.frontend.template')

@section('content')
<section id="blog" class="pt-16 pb-32 bg-slate-100">
    <div class="container">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h2 class="font-semibold text-red-500 text-2xl mb-4 sm:text-3xl lg:text-4xl">Makanan & Minuman</h2>
            </div>
        </div>

        <div class="flex flex-wrap justify-center">
            @foreach ($menus as $menu)
            <div class="w-full px-4 lg:w-1/3 xl:w-1/4">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10">
                    <img src="{{ $menu->galleries()->exists() ? Storage::url($menu->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}" alt="" class="w-full max-h-40">
                    <div class="py-8 px-6">
                        <h3>
                            <a href="{{ route('details', $menu->slug) }}" class="block mb-3 font-semibold text-xl text-dark hover:text-red-500">{{ $menu->name }}</a>
                        </h3>
                    </div>
                    <div class="flex items-center justify-between p-4">
                        <span class="text-xl font-semibold text-red-500">Rp.{{ number_format($menu->price) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection