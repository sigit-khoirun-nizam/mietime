@extends('layouts.frontend.template')

@section('content')
<section class="bg-slate-100">
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h2 class="font-semibold text-red-500 text-2xl mb-4 sm:text-3xl lg:text-4xl text-center">Kontak</h2>
        <p class="font-medium text-md text-secondary md:text-lg line-clamp-1 text-center">Apakah anda ingin menghubungi kami ?</p>
        <form method="POST" action="{{ route('contact-submit') }}" class="space-y-8">
            @csrf
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                <input type="text" name="name" class="w-full bg-slate-200 p-2.5 text-dark rounded-md focus:outline-none focus:ring-red-500 focus:ring-1 focus:border-red-500" required>
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" name="email" name="" class="w-full bg-slate-200 p-2.5 text-dark rounded-md focus:outline-none focus:ring-red-500 focus:ring-1 focus:border-red-500" required>
            </div>
            
            <div class="sm:col-span-2">
                <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Pesan</label>
                <textarea name="content" rows="6" class="w-full bg-slate-200 p-2.5 text-dark rounded-md focus:outline-none focus:ring-red-500 focus:ring-1 focus:border-red-500" required></textarea>
            </div>
            <button type="submit" class="text-base font-semibold text-white bg-red-500 py-3 px-8 w-full rounded-full hover:opacity-80 hover:shadow-lg transition duration-500">Kirim</button>
        </form>
    </div>
</section>
@endsection