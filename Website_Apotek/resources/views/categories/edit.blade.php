<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Category Name:</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
