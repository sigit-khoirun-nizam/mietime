<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Testimoni') }}
        </h2>
    </x-slot>

    <div class="p-6">
        <div class="my-7">
            <a href="{{ route('dashboard.indexTesti') }}" class="text-base font-semibold text-white bg-blue-500 py-2 px-4 rounded-lg hover:opacity-80 hover:shadow-lg transition duration-500">Kembali</a>
        </div>
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b">Nama Pelanggan</th>
                    <th class="py-2 px-4 border-b">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b text-center">{{ $testi->nama_pelanggan }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $testi->nama_makanan }}</td>
                </tr>
            </tbody>
            
        </table>
        {{-- <div class="my-2">
            {{ $testi->links() }}
        </div> --}}
    </div>

</x-app-layout>
