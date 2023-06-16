@extends('layouts.frontend.template')

@section('content')

<!-- START: DETAILS -->
<section class="container mx-auto">
    <div class="flex flex-wrap my-4 md:my-12">
        <div class="w-full md:hidden px-4">
            {{-- <h2 class="text-5xl font-semibold">{{ $menus->name }}</h2>
            <span class="text-xl">Rp. {{ number_format($menus->price) }}</span> --}}
        </div>
        <div class="flex-1">
            <div class="slider">
                <div class="thumbnail">
                    @foreach ($menus->galleries as $item)
                    <div class="px-2">
                        <div class="item {{ $loop->first ? 'selected' : '' }}" data-img="{{ Storage::url($item->url) }}">
                            <img src="{{ Storage::url($item->url) }}" alt="front"
                                class="object-cover w-full h-full rounded-lg" />
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="preview">
                    <div class="item rounded-lg h-full overflow-hidden">
                        <img src="{{ $menus->galleries()->exists() ? Storage::url($menus->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}" alt="front"
                            class="object-cover w-full h-full rounded-lg" />
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-1 px-4 md:p-6">
            <h4 class="text-xl md:text-3xl font-semibold">{{ $menus->name }}</h4>
            <p class="text-xl md:text-2xl">Rp. {{ ($menus->price) }}</p>

            <form action="{{ route('cart-add', $menus->id) }}" method="POST">
                @csrf
                <button type="submit" class="transition-all duration-200 bg-gray-500 text-white font-semibold focus:text-pink-400 rounded-full px-5 py-3 mt-4 inline-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="ml-2">Tambah</span>
                </button>
            </form>
            <hr class="my-8" />

            <h6 class="text-xl font-semibold mb-4">Deskripsi</h6>
            <p class="text-xl leading-7">
                {!! $menus->description !!}
            </p>
        </div>
    </div>
</section>
<!-- END: DETAILS -->

<!-- START: COMPLETE YOUR ROOM -->
<section class="bg-gray-100 px-4 py-16">
    <div class="container mx-auto">
        <div class="flex flex-start mb-4">
            <h3 class="text-2xl capitalize font-semibold">
                Menu lainnya
            </h3>
        </div>
        <div class="flex overflow-x-auto mb-4 -mx-3">
            @foreach ($recommendations as $recommendation)
            <div class="px-3 flex-none" style="width: 320px">
                <div class="rounded-xl p-4 pb-8 relative bg-white">
                    <div class="rounded-xl overflow-hidden card-shadow w-full h-36">
                        <img src="{{ $recommendation->galleries()->exists() ? Storage::url($recommendation->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}" alt=""
                            class="w-full h-full object-cover object-center" />
                    </div>
                    <h5 class="text-lg font-semibold mt-4">{{ $recommendation->name }}</h5>
                    <span class="">Rp. {{ ($recommendation->price) }}</span>
                    <a href="{{ route('details', $recommendation->slug) }}" class="stretched-link">
                        <!-- fake children -->
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- END: COMPLETE YOUR ROOM -->
@endsection
