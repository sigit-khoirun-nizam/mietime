<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="m-5">
        <div class="my-7">
            <a href="{{ route('dashboard.posts.create') }}" class="bg-green-600 hover:bg-green-700 text-white py-2 px-1 rounded">Tambah Post</a>
        </div>
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b">No</th>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Slug</th>
                    <th class="py-2 px-4 border-b">Category</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $i => $post)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $i+1 }}</td>
                    <td class="py-2 px-4 border-b">{{ $post->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $post->slug }}</td>
                    <td class="py-2 px-4 border-b">{{ $post->category_name }}</td>
                    <td>
                        @if ($post->status == 1)
                        <span class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm py-2 px-2 mr-2 mb-2">Publish</span>
                            
                        @else
                        <span class="focus:outline-none text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm py-2 px-2 mr-2 mb-2">Draft</span>
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('dashboard.posts.edit', $post->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-2 rounded">Edit</a>
                        <form action="{{ route('dashboard.posts.destroy',$post->id) }}" method="POST"
                            onsubmit="return confirm('{{ trans('are You Sure ? ') }}');"
                            style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-2 rounded"
                                value="Delete">
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4" class="text-center">Tidak ada data postingan</td>
                @endforelse
            </tbody>
            
        </table>
        <div class="my-2">
            {{ $posts->links() }}
        </div>
    </div>

</x-app-layout>
