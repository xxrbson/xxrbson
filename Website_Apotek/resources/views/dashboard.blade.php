<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto p-4">
                        <h2 class="text-2xl font-semibold">Obat List</h2>
                            <div class="row">
                                @foreach($obats as $obat)
                                    <div class="col-md-3 mb-4">
                                        <div class="card">
                                            @if($obat->image)
                                                <img src="{{ asset('storage/' . $obat->image) }}" class="card-img-top" alt="Image of {{ $obat->nama_obat }}">
                                            @else
                                                <img src="{{ asset('images/default-image.jpg') }}" class="card-img-top" alt="No Image Available">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $obat->nama_obat }}</h5>
                                                <p class="card-text">{{ $obat->deskripsi }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
