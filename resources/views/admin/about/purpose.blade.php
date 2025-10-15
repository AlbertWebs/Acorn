@extends('layouts.admin')

@section('title', 'Edit Our Purpose')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">

    <!-- Page Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Edit “Our Purpose”</h1>
            <p class="text-gray-500 mt-1">Update the purpose statement and its message below.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}"
           class="inline-flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="mb-6 bg-green-100 text-green-800 border border-green-300 px-4 py-3 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="mb-6 bg-red-100 text-red-800 border border-red-300 px-4 py-3 rounded-md">
            <strong>Whoops!</strong> Please fix the following:
            <ul class="list-disc pl-6 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Form -->
    <div class="bg-white rounded-lg shadow-md p-6 border border-gray-100">
        <form action="{{ route('admin.purpose.update', $purpose->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Title</label>
                <input type="text" name="title" value="{{ old('title', $purpose->title) }}"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
            </div>

            <!-- Content -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Content</label>
                <textarea id="editor" name="content" rows="10"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">{{ old('content', $purpose->content) }}</textarea>
                <p class="text-sm text-gray-500 mt-2">You can include formatted text, bullet points, and emojis.</p>
            </div>

            <!-- Save Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-md shadow transition">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Optional: TinyMCE / Trix Editor Script -->
 {{-- Initialize CKEditor with min-height --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let editorInstance;

                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .then(editor => {
                        editorInstance = editor;

                        // Set minimum height
                        editor.editing.view.change(writer => {
                            writer.setStyle('min-height', '200px', editor.editing.view.document.getRoot());
                        });

                        // Sync editor content to textarea before form submission
                        const form = document.querySelector('form');
                        if (form) {
                            form.addEventListener('submit', function () {
                                document.querySelector('#editor').value = editorInstance.getData();
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error initializing CKEditor:', error);
                    });
            });
        </script>

@endsection
