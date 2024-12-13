<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Obat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto p-4">

                    <div class="mb-4 d-flex justify-content-between w-100 align-items-center">
                            <span class="text-2xl font-semibold">Daftar Obat</span>

                            <a href="{{ route('obats.create') }}" class="btn btn-danger">
                                Tambah Obat
                            </a>
                        </div>
                        <!-- Display the obat details -->
                        <div class="overflow-x-auto bg-dark shadow-md rounded-lg">
                        <table class="w-100">
                        <thead class="bg-dark-100">
                                    <tr>
                                        <th>Nama Obat</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Gambar</th>
                                        <th>Terlaris</th>
                                        <th>Berat</th>
                                        <th>Aksi</th> <!-- Column for actions -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obats as $obat)
                                        <tr>
                                            <td>{{ $obat->nama_obat }}</td>
                                            <td>{{ $obat->deskripsi }}</td>
                                            <td>{{ number_format($obat->harga, 2) }}</td>
                                            <td>{{ $obat->stok }}</td>
                                            <td>
                                                @if($obat->image)
                                                    <img src="{{ asset('storage/'.$obat->image) }}" alt="Image" width="50">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $obat->terlaris ? 'Yes' : 'No' }}</td>
                                            <td>{{ $obat->weight }} gram</td>
                                            <td class="px-4 py-2">
                                            <a href="{{ route('obats.edit', $obat->id) }}"
                                                class="text-yellow-500 hover:text-yellow-700"> <i
                                                    class="fas fa-edit"></i></a>
                                            <form action="{{ route('obats.destroy', $obat->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700"> <i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
