<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit &raquo; Menu &raquo; {{ $menu->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @if ($errors->any())
                    <div class="mb-5" role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            Et's inputan tidak boleh kosong ya!
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </p>
                        </div>
                    </div>
                @endif

                <form action="{{ route('dashboard.menu.update', $menu->id) }}" class="w-full" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Nama
                            </label>
                            <input value="{{ old('name') ?? $menu->name }}" name="name" class="appearance-none block w-full bg-white text-gray-700 border border-slate-900 rounded py-3 px-4 leading-tight focus:outline-none focus:ring-red-500 focus:ring-1 focus:border-red-500" id="grid-last-name" type="text">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Deskripsi
                            </label>
                            <textarea name="description" class="appearance-none block w-full bg-white text-gray-700 border border-slate-900 rounded py-3 px-4 leading-tight focus:outline-none focus:ring-red-500 focus:ring-1 focus:border-red-500" id="grid-last-name" type="text" >{!! old('description') ?? $menu->description !!}</textarea>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Harga
                            </label>
                            <input value="{{ old('price') ?? $menu->price }}" name="price" class="appearance-none block w-full bg-white text-gray-700 border border-slate-900 rounded py-3 px-4 leading-tight focus:outline-none focus:ring-red-500 focus:ring-1 focus:border-red-500" id="grid-last-name" type="number" >
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 text-right">
                            <button type="submit" class="text-base font-semibold text-white bg-teal-500 py-2 px-4 rounded-full hover:opacity-80 hover:shadow-lg transition duration-500">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</x-app-layout>
