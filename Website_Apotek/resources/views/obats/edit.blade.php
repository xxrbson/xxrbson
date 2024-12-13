<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Obat') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto p-4">
                        <div class="mb-4 d-flex justify-content-between w-100 align-items-center">
                            <span class="text-2xl font-semibold">Edit Obat</span>
                        </div>
                        <div class="overflow-x-auto bg-dark shadow-md rounded-lg">
                            <form action="{{ route('obats.update', $obat->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Brand Dropdown -->
                                <div class="form-group">
                                    <label for="brand_id">Brand:</label>
                                    <select name="brand_id" id="brand_id" class="form-control" required>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $obat->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                        @endforeach
                                    </select><br>
                                </div>

                                <!-- Category Dropdown -->
                                <div class="form-group">
                                    <label for="category_id">Category:</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $obat->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select><br>
                                </div>

                                <div class="form-group">
                                    <label for="nama_obat">Nama Obat:</label>
                                    <input class="form-control" type="text" id="nama_obat" name="nama_obat" value="{{ $obat->nama_obat }}" required><br>
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi:</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $obat->deskripsi }}</textarea><br>
                                </div>

                                <div class="form-group">
                                    <label for="harga">Harga:</label>
                                    <input class="form-control" type="number" id="harga" name="harga" value="{{ $obat->harga }}" required><br>
                                </div>

                                <div class="form-group">
                                    <label for="stok">Stok:</label>
                                    <input class="form-control" type="number" id="stok" name="stok" value="{{ $obat->stok }}" required><br>
                                </div>

                                <div class="form-group">
                                    <label for="terlaris">Terlaris:</label>
                                    <select name="terlaris" id="terlaris" class="form-control" required>
                                        <option value="1" {{ $obat->terlaris ? 'selected' : '' }}>Ya</option>
                                        <option value="0" {{ !$obat->terlaris ? 'selected' : '' }}>Tidak</option>
                                    </select><br>
                                </div>

                                <div class="form-group">
                                    <label for="weight">Berat (gram):</label>
                                    <input class="form-control" type="number" id="weight" name="weight" value="{{ $obat->weight }}" step="0.01" required><br>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" accept="image/*">
                                    <br>
                                    @if($obat->image)
                                        <img src="{{ asset('storage/'.$obat->image) }}" width="100" alt="Obat Image">
                                    @endif
                                </div>

                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
