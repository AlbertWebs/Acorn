@extends('layouts.admin')

@section('title', 'Add Company History')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Add Company History</h2>
        <a href="{{ route('admin.dashboard') }}"
           class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-md text-sm">
            ← Back to Dashboard
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 px-4 py-3 rounded-md mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.history.store') }}" method="POST" enctype="multipart/form-data"
          class="bg-white shadow-md rounded-lg p-6">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
            <input type="text" name="title" id="title"
                   value="{{ old('title') }}"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200"
                   placeholder="Enter history title">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-medium mb-2">Featured Image</label>
            <input type="file" name="image" id="image"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none">
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
            <textarea name="content" id="content" rows="6"
                      class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200"
                      placeholder="Write about the company’s history...">{{ old('content') }}</textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-5 py-2 rounded-md transition">
                Save History
            </button>
        </div>
    </form>
</div>
@endsection
