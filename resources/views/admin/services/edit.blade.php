@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
        <i class="fas fa-edit text-yellow-500"></i> Edit Service
    </h2>

    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data"
          class="bg-white shadow-lg rounded-xl p-6 space-y-6 border border-gray-100">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div>
            <label class="block text-gray-700 font-medium mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" required
                   class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
        </div>

        {{-- Description --}}
        <div>
            <label class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea id="editor" name="description" rows="5"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none resize-none">{{ old('description', $service->description) }}</textarea>
        </div>

        {{-- Image --}}
        <div>
            <label class="block text-gray-700 font-medium mb-2">Change Image</label>
            @if($service->image)
                <img style="width:200px; object-fit:cover" src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->title }}" class="h-24 rounded-lg mb-3 border">
            @endif
            <input type="file" name="image" accept="image/*"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
        </div>

        {{-- Active Status --}}
        <div class="flex items-center space-x-2">
            <input type="checkbox" name="is_active" id="is_active" {{ $service->is_active ? 'checked' : '' }}
                   class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            <label for="is_active" class="text-gray-700 font-medium">Active</label>
        </div>

        {{-- SEO Settings --}}
        <div class="border-t border-gray-200 pt-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-search text-blue-600"></i> SEO Settings
            </h3>

            <div class="space-y-4">
                {{-- SEO Title --}}
                <div>
                    <label class="block text-gray-700 font-medium mb-2">SEO Title</label>
                    <input type="text" name="seo_title" value="{{ old('seo_title', $service->seo_title) }}"
                           class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                           placeholder="Enter SEO-friendly title for Google search">
                </div>

                {{-- SEO Description --}}
                <div>
                    <label class="block text-gray-700 font-medium mb-2">SEO Description</label>
                    <textarea name="seo_description" rows="3"
                              class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none resize-none"
                              placeholder="Brief description for search engines (150–160 characters recommended)...">{{ old('seo_description', $service->seo_description) }}</textarea>
                </div>

                {{-- SEO Keywords --}}
                <div>
                    <label class="block text-gray-700 font-medium mb-2">SEO Keywords</label>
                    <input type="text" name="seo_keywords" value="{{ old('seo_keywords', $service->seo_keywords) }}"
                           class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                           placeholder="e.g., Inclusive Education, Special Needs Support, Teacher Training">
                    <p class="text-sm text-gray-500 mt-1">Separate keywords with commas.</p>
                </div>
            </div>
        </div>

        {{-- Buttons --}}
        <div class="flex items-center gap-3 pt-6">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow transition flex items-center gap-2">
                <i class="fas fa-save"></i> Update
            </button>
            <a href="{{ route('admin.services.index') }}"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-2 rounded-lg shadow transition flex items-center gap-2">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>

{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error('CKEditor initialization error:', error);
        });
</script>
@endsection
