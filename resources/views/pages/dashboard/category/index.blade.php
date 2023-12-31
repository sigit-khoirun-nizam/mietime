<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="p-10">
        <div class="my-7">
            <a href="{{ route('dashboard.categories.create') }}" class="text-base font-semibold text-white bg-blue-500 py-2 px-4 rounded-lg hover:opacity-80 hover:shadow-lg transition duration-500">+ Kategori</a>
        </div>
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b">No</th>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Slug</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $i => $category)
                <tr>
                    <td class="py-2 px-4 border-b text-center">{{ $i+1 }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $category->name }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $category->slug }}</td>
                    <td class="py-2 px-4 border-b text-center">
                        <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-2 rounded">Edit</a>
                        <form action="{{ route('dashboard.categories.destroy',$category->id) }}" method="POST"
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
                    <td colspan="4" class="text-center">Tidak ada data kategori</td>
                @endforelse
            </tbody>
            
        </table>
        <div class="my-2">
            {{ $categories->links() }}
        </div>
    </div>

</x-app-layout>
