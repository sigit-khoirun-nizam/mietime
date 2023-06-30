<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Testimoni') }}
        </h2>
    </x-slot>

    <div class="p-10">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b">No</th>
                    <th class="py-2 px-4 border-b">Nama Pelanggan</th>
                    <th class="py-2 px-4 border-b">Nama Makanan</th>
                    <th class="py-2 px-4 border-b">Nomor Hp</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($testi as $i => $testi)
                <tr>
                    <td class="py-2 px-4 border-b text-center">{{ $i+1 }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $testi->nama_pelanggan }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $testi->nama_makanan }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $testi->no_wa }}</td>
                    <td class="py-2 px-4 border-b text-center">
                        <a href="{{ route('dashboard.testimonial.show', $testi->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-2 rounded">Lihat</a>
                        <form action="{{ route('dashboard.posts.destroy',$testi->id) }}" method="POST"
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
        {{-- <div class="my-2">
            {{ $testi->links() }}
        </div> --}}
    </div>

</x-app-layout>
