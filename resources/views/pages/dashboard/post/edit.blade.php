<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kategori &raquo; Create
        </h2>
    </x-slot>

    <div class="container mx-auto mt-14">
        <form action="{{url('dashboard/posts/'.$post->id)}}"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold">Category</label>
                <select class="mt-1 block w-full py-2 px-3 border bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                @error('category_id') is-invalid @enderror" name="category_id" aria-label="Default select example">
                    <option value="" selected>--Select Category--</option>
                    @foreach($categories as $key => $data)
                        <option value=" {{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold" for="title">
                    Post Title
                </label>
                <input name="title" value="{{$post->title}}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" placeholder="Masukkan Judul" @error('title') is-invalid @enderror">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Choose a file:</label>
                <div
                    class="mt-1 flex justify-center items-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 14l4-4 4 4m0 0l-4 4-4-4m4-4v12" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="image"
                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span>Cari</span>
                                <input id="image" name="image" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">atau bisa di drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                        @if($post->image == null)
                        @else
                        <img class="w-60" src="{{url('uploads/post/' .$post->image)}}">
                        @endif
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold" for="title">
                    Konten
                </label>
                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="content" name="content">{{$post->content}}</textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold">Status</label>
                        <div class="my-1">
                            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" type="radio" name="status" value="1" id="flexRadioDefault1"
                                checked>
                            <label class="ml-2 text-sm font-medium text-gray-900" for="flexRadioDefault1">
                                Publish
                            </label>
                        </div>
                        <div class="my-1">
                            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" type="radio" name="status" value="0" id="flexRadioDefault2">
                            <label class="ml-2 text-sm font-medium text-gray-900" for="flexRadioDefault2">
                                Save to Draft
                            </label>
                        </div>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>

</x-app-layout>
