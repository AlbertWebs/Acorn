@extends('layouts.admin')

@section('title', 'Edit Core Value')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Edit Core Value</h1>
        <p class="text-gray-500 mt-1">Update this value’s title or description.</p>
    </div>

    <form action="{{ route('admin.core-values.update', $coreValue->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 font-medium mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title', $coreValue->title) }}"
                   class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" rows="5"
                      class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $coreValue->description) }}</textarea>
            @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md shadow transition">
                Update Core Value
            </button>
        </div>
    </form>
</div>
@endsection
