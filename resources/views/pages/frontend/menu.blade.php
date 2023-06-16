@extends('layouts.frontend.template')

@section('content')
<div class="container w-full px-5 py-6 mx-auto">
    <div class="grid lg:grid-cols-4 gap-y-6">
        @foreach ($menus as $menu)
            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                <img class="w-full h-48" src="{{ $menu->galleries()->exists() ? Storage::url($menu->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
                    alt="Image" />
                <div class="px-6 py-4">
                    <div class="flex mb-2">

                    </div>
                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase"><a href="{{ route('details', $menu->slug) }}">
                        {{ $menu->name }}
                    </a>
                    </h4>
                </div>
                <div class="flex items-center justify-between p-4">
                    <span class="text-xl text-green-600">Rp.{{ ($menu->price) }}</span>
                </div>
            </div>
        @endforeach

    </div>
</div>


@endsection