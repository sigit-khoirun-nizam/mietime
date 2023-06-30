@extends('layouts.frontend.template')

@section('content')
<section class="bg-slate-100">
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h2 class="font-semibold text-red-500 text-2xl mb-4 sm:text-3xl lg:text-4xl text-center">Testimoni</h2>
        <p class="font-medium text-md text-secondary md:text-lg line-clamp-1 text-center mb-5">Apakah anda ingin memberikan testimoni kepada kami ?</p>

        @if ($errors->any())
        <div role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Whoops! There were some problems with your input.
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <form method="POST" action="{{ route('testimoni-submit') }}" class="space-y-8" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="nama_pelanggan" class="block mb-2 text-sm font-medium text-gray-900">Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="w-full bg-slate-200 p-2.5 text-dark rounded-md focus:outline-none focus:ring-red-500 focus:ring-1 focus:border-red-500" required>
            </div>
            <div>
                <label for="nama_makanan" class="block mb-2 text-sm font-medium text-gray-900">Nama Makanan</label>
                <input type="text" name="nama_makanan" class="w-full bg-slate-200 p-2.5 text-dark rounded-md focus:outline-none focus:ring-red-500 focus:ring-1 focus:border-red-500" required>
            </div>
            <div>
                <label for="no_wa" class="block mb-2 text-sm font-medium text-gray-900">No Wa</label>
                <input type="number" name="no_wa" class="w-full bg-slate-200 p-2.5 text-dark rounded-md focus:outline-none focus:ring-red-500 focus:ring-1 focus:border-red-500" required>
            </div>
            <div>
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                <input type="text" name="alamat" class="w-full bg-slate-200 p-2.5 text-dark rounded-md focus:outline-none focus:ring-red-500 focus:ring-1 focus:border-red-500" required>
            </div>
            <div class="sm:col-span-2">
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                <textarea name="deskripsi" rows="6" class="w-full bg-slate-200 p-2.5 text-dark rounded-md focus:outline-none focus:ring-red-500 focus:ring-1 focus:border-red-500" required></textarea>
            </div>
            <div>
                <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                <input type="file" name="gambar" class="w-full bg-slate-200 p-2.5 text-dark rounded-md focus:outline-none focus:ring-red-500 focus:ring-1 focus:border-red-500" required>
            </div>
            <button type="submit" class="text-base font-semibold text-white bg-red-500 py-3 px-8 w-full rounded-full hover:opacity-80 hover:shadow-lg transition duration-500">Kirim</button>
        </form>
    </div>
</section>
@endsection