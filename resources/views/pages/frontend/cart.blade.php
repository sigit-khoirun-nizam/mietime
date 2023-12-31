@extends('layouts.frontend.template')

@section('content')
<!-- START: BREADCRUMB -->
<section class="bg-gray-100 py-8 px-4">
    <div class="container mx-auto">
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('index') }}">Home</a>
            </li>
            <li>
                <a href="{{ route('cart') }}" aria-label="current-page">Keranjang</a>
            </li>
        </ul>
    </div>
</section>
<!-- END: BREADCRUMB -->

<!-- START: COMPLETE YOUR ROOM -->
<section class="md:py-16">
    <div class="container mx-auto px-4">
        <div class="flex -mx-4 flex-wrap">
            <div class="w-full px-4 mb-4 md:w-8/12 md:mb-0" id="shopping-cart">
                <div class="flex flex-start mb-4 mt-8 pb-3 border-b border-red-500 md:border-b-0">
                    <h3 class="text-2xl font-sans font-semibold">Keranjang</h3>
                </div>

                <div class="border-b border-gray-800 mb-4 hidden md:block">
                    <div class="flex flex-start items-center pb-2 -mx-4">
                        <div class="px-4 flex-none">
                            <div class="" style="width: 90px">
                                <h6 class="font-sans font-semibold">Gambar</h6>
                            </div>
                        </div>
                        <div class="px-4 w-5/12">
                            <div class="">
                                <h6 class="font-sans font-semibold">Menu</h6>
                            </div>
                        </div>
                        <div class="px-4 w-5/12">
                            <div class="">
                                <h6 class="font-sans font-semibold">Harga</h6>
                            </div>
                        </div>
                        <div class="px-4 w-2/12">
                            <div class="text-center">
                                <h6 class="font-sans font-semibold">Aksi</h6>
                            </div>
                        </div>
                    </div>
                </div>

                @forelse ($carts as $item)
                    <!-- START: ROW 1 -->
                <div class="flex flex-start flex-wrap items-center mb-4 -mx-4" data-row="1">
                    <div class="px-4 flex-none">
                        <div class="" style="width: 90px; height: 90px">
                            <img src="{{ $item->menu->galleries()->exists() ? Storage::url($item->menu->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}" alt="chair-1"
                                class="object-cover rounded-xl w-full h-full" />
                        </div>
                    </div>
                    <div class="px-4 w-auto flex-1 md:w-5/12">
                        <div class="">
                            <h6 class="font-semibold text-lg md:text-xl leading-8">
                                {{ $item->menu->name }}
                            </h6>
                            <h6 class="font-semibold text-base md:text-lg block md:hidden">
                                Rp. {{ number_format($item->menu->price) }}
                            </h6>
                        </div>
                    </div>
                    <div class="px-4 w-auto flex-none md:flex-1 md:w-5/12 hidden md:block">
                        <div class="">
                            <h6 class="font-semibold text-lg">Rp. {{ number_format($item->menu->price) }}</h6>
                        </div>
                    </div>
                    <div class="px-4 w-2/12">
                        <div class="text-center">
                            <form action="{{ route('cart-delete', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 border-none focus:outline-none px-3 py-1">
                                    X
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END: ROW 1 -->
                @empty
                <p id="cart-empty" class="text-center py-8">
                    Waduh... keranjang kosong nih buruan pesan makanan dan minuman
                    <a href="{{ route('menu') }}" class="font-semibold">Disini</a>
                </p>
                @endforelse

            </div>
            <div class="w-full md:px-4 md:w-4/12" id="shipping-detail">
                <div class="bg-gray-100 px-4 py-6 md:p-8 md:rounded-3xl">
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <div class="flex flex-start mb-6">
                            <h3 class="text-2xl font-semibold">Reservasi</h3>
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="complete-name" class="text-sm mb-2">Nama</label>
                            <input data-input name="name" type="text" id="complete-name"
                                class="border-gray-800 border rounded-lg px-4 py-2 bg-white text-sm focus:ring-red-500 focus:ring-1 focus:border-red-500"
                                placeholder="Masukkan nama" />
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="email" class="text-sm mb-2">Email</label>
                            <input data-input name="email" type="email" id="email"
                                class="border-gray-800 border rounded-lg px-4 py-2 bg-white text-sm focus:ring-red-500 focus:ring-1 focus:border-red-500"
                                placeholder="Masukkan email" />
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="address" class="text-sm mb-2">Alamat</label>
                            <input data-input name="address" type="text" id="address"
                                class="border-gray-800 border rounded-lg px-4 py-2 bg-white text-sm focus:ring-red-500 focus:ring-1 focus:border-red-500"
                                placeholder="Masukkan alamat" />
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="phone-number" class="text-sm mb-2">Nomor HP</label>
                            <input data-input name="phone" type="tel" id="phone-number"
                                class="border-gray-800 border rounded-lg px-4 py-2 bg-white text-sm focus:ring-red-500 focus:ring-1 focus:border-red-500"
                                placeholder="Masukkan nomor HP" />
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="res_date" class="text-sm mb-2">Reservasi</label>
                            <input data-input type="datetime-local" name="res_date" id="res_date"
                                class="border-gray-800 border rounded-lg px-4 py-2 bg-white text-sm focus:ring-red-500 focus:ring-1 focus:border-red-500"
                                placeholder="Masukkan tanggal reservasi" />
                        </div>
                        <div class="text-center">
                            <button type="submit" 
                                class="text-base font-semibold text-white bg-red-500 py-3 px-8 w-full rounded-full hover:opacity-80 hover:shadow-lg transition duration-500">
                                Buat reservasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END: COMPLETE YOUR ROOM -->
@endsection