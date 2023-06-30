<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Menu &raquo; {{ $menu->name }} &raquo; Gallery
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX Datatable

            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}'
                },
                columns: [
                    { data: 'id', name: 'id', width: '5%' },
                    { data: 'url', url: 'url' },
                    { data: 'is_featured', name: 'is_featured' },
                    { 
                        data: 'action', 
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '25%'
                    },
                ]
            })
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('dashboard.menu.gallery.create', $menu->id) }}" class="text-base font-semibold text-white bg-blue-500 py-2 px-4 rounded-lg hover:opacity-80 hover:shadow-lg transition duration-500">
                    + Upload 
                </a>
            </div>
            <div class="shadow overflow-hidden rounded">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Featured</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
