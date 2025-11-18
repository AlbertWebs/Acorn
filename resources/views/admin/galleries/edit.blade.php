@extends('layouts.admin')

@section('title','Edit Gallery')

@section('content')
<div class="p-6 max-w-3xl">
    <a href="{{ route('admin.galleries.index') }}" class="text-indigo-600 hover:underline inline-flex items-center gap-2 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <div class="bg-white border rounded-md shadow-sm">
        <div class="p-4 border-b">
            <h1 class="text-xl font-semibold">Edit Gallery</h1>
        </div>
        <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="p-4 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title', $gallery->title) }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Caption</label>
                <input type="text" name="caption" value="{{ old('caption', $gallery->caption) }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Current Image</label>
                <img src="{{ asset('storage/'.$gallery->image) }}" alt="" class="h-40 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Replace Image (optional)</label>
                <input type="file" name="image" accept="image/*" class="w-full border rounded px-3 py-2">
            </div>

            <div class="flex items-center gap-2">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                <label for="is_active">Active</label>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Context</label>
                    <select name="context_type" class="w-full border rounded px-3 py-2">
                        <option value="" {{ old('context_type', $gallery->context_type)==='' ? 'selected' : '' }}>General</option>
                        <option value="trainings" {{ old('context_type', $gallery->context_type)==='trainings' ? 'selected' : '' }}>Trainings</option>
                        <option value="history" {{ old('context_type', $gallery->context_type)==='history' ? 'selected' : '' }}>History</option>
                        <option value="event" {{ old('context_type', $gallery->context_type)==='event' ? 'selected' : '' }}>Event</option>
                        <option value="csr" {{ old('context_type', $gallery->context_type)==='csr' ? 'selected' : '' }}>CSR</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Reference (slug or id)</label>
                    <input type="text" name="context_slug" value="{{ old('context_slug', $gallery->context_slug) }}" class="w-full border rounded px-3 py-2" placeholder="e.g. event-slug or history-id">
                </div>
            </div>

            <div class="pt-2">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection


