@extends('layouts.frontend.template')

@section('content')
{{-- Hero Section --}}
<!-- Container for demo purpose -->
    <!-- Section: Design Block -->
    <section>
        <div class="relative overflow-hidden bg-no-repeat bg-cover" style="
        background-position: 50%;
        background-image: url('https://cdn.pixabay.com/photo/2016/11/18/14/39/beans-1834984_960_720.jpg');
        height: 600px;
        ">
            <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
                style="background-color: rgba(0, 0, 0, 0.6)">
                <div class="flex justify-center items-center h-full">
                    <div class="text-center bg-clip-text text-slate-300 px-6 md:px-12">
                        <h1 class="block font-bold text-slate-200 text-4xl mt-1 lg:text-5xl">
                            Selamat Datang 
                        </h1>
                        <h2 class="font-semibold text-slate-300 text-lg mb-5 lg:text-2xl">Di Website Mie Time Simo</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
{{-- End Hero Section --}}

{{-- Our Story --}}
<section class="px py-32 bg-white md:px-0">
    <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
        <div class="flex flex-wrap items-center sm:-mx-3">
            <div class="w-full md:w-1/2 md:px-3">
                <div class="w-full pb-6 space-y-4 sm:max-w-md lg:max-w-lg lg:space-y-4 lg:pr-0 md:pb-0">
                    <!-- <h1
                        class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl"
                        > -->
                    </h3>
                    <h2 class="font-semibold text-red-500 text-2xl mb-4 sm:text-3xl lg:text-4xl">Tentang Kami</h2>
                    <!-- </h1> -->
                    <p class="font-medium text-md text-slate-500 md:text-lg">
                        Mie time simo menghidangkan aneka makanan atau minuman yang sangat murah bagi kalangan warga
                        desa, mie time tersebut letaknya jln. raya ps. sungelebak karanggeneng lamongan no.5, simo,
                        sungelebak, kec. karanggeneng, kabupaten lamongan.
                    </p>
                    <div class="relative flex">
                        <button type="button" class="text-base font-semibold text-white bg-red-500 py-3 px-8 rounded-full hover:opacity-80 hover:shadow-lg transition duration-500"><a href="https://goo.gl/maps/wyftmwYaXd5fyAMj7" target="_blank">Lebih Lanjut</a></button>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl">
                    <img src="https://cdn.pixabay.com/photo/2017/08/03/13/30/people-2576336_960_720.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>
{{-- End Our Story --}}

{{-- About Us --}}
<section class="py-20 bg-gray-50">
    <div class="container items-center max-w-6xl px-4 mx-auto sm:px-20 md:px-32 lg:px-16">
        <div class="flex flex-wrap items-center -mx-3">
            <div class="order-1 w-full px-3 lg:w-1/2 lg:order-0">
                <div class="w-full lg:max-w-md">
                    {{-- <h2 class="mb-4 text-2xl font-bold">About Us</h2> --}}
                    <h2
                        class="font-semibold text-red-500 text-2xl mb-4 sm:text-3xl lg:text-4xl">
                        Kenapa Memilih Kami?</h2>

                    <p class="font-medium text-md text-slate-500 md:text-lg mb-10">Para chef sendiri di mie time sudah
                        mahir dengan membuat makanan atau minuman dikarenakan mereka sudah terlatih secara kompeten.</p>
                    <ul>
                        <li class="flex items-center py-2 space-x-4 xl:py-3">
                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z">
                                </path>
                            </svg>
                            <span class="font-medium text-gray-500">Memasak dengan sangat cepat</span>
                        </li>
                        <li class="flex items-center py-2 space-x-4 xl:py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="font-medium text-gray-500">Pelayanan yang sangat baik</span>
                        </li>
                        <li class="flex items-center py-2 space-x-4 xl:py-3">
                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                            <span class="font-medium text-gray-500">Karyawan yang sangat ramah</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full px-3 mb-12 lg:w-1/2 order-0 lg:order-1 lg:mb-0"><img
                    class="mx-auto sm:max-w-sm lg:max-w-full"
                    src="https://cdn.pixabay.com/photo/2020/12/31/12/28/cook-5876388_960_720.png" alt="feature image">
            </div>
        </div>
    </div>
</section>
{{-- End About Us --}}

{{-- Menu favorite --}}
<section id="menu" class="pt-16 pb-16 bg-slate-100">
    <div class="container">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h2 class="font-semibold text-red-500 text-2xl mb-4 sm:text-3xl lg:text-4xl">Menu Favorite</h2>
            </div>
        </div>

        <div class="flex flex-wrap justify-center">
            @foreach($menus as $menu)
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
{{-- End menu favorite --}}

{{-- Testimonials --}}
<section id="testimonial" class="pt-16 pb-16 bg-slate-100">
            <div class="container">
                <div class="w-full px-4">
                    <div class="max-w-xl mx-auto text-center mb-32">
                        <h2 class="font-semibold text-red-500 text-2xl mb-4 sm:text-3xl lg:text-4xl">Testimonial</h2>
                        <p class="font-medium text-md text-slate-500 md:text-lg">Berikut adalah testimoni dari pelanggan kami</p>
                    </div>
                </div>

                
                <div class="flex flex-wrap justify-center gap-5 pb-24">
                    @foreach ($testimonials as $testimonial)
                    <div class="p-4 bg-white rounded-lg shadow-lg w-full px-4 lg:w-1/3 xl:w-1/4">
                        <div class="flex justify-center -mt-16 md:justify-end">
                            <img class="object-cover w-20 h-20 border-2 border-red-500 rounded-full"
                                    src="{{ url($testimonial->image) }}"
                                    alt="Image" />
                        </div>
                        <div>
                            <h2 class="block font-semibold text-xl text-dark hover:text-red-500 truncate">{{ $testimonial->nama_makanan }}</h2>
                            <p class="mt-2 text-gray-600">{{ $testimonial->deskripsi }}</p>
                        </div>
                        <div class="flex justify-end mt-4">
                            <span class="text-xl font-medium text-red-500">{{ $testimonial->nama_pelanggan }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                
            </div>
        </section>
{{-- End Testimonials --}}
@endsection
