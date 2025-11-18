@extends('layouts.admin')

@section('title','Add Image')

@section('content')
<div class="p-6 max-w-3xl">
    <a href="{{ route('admin.galleries.index') }}" class="text-indigo-600 hover:underline inline-flex items-center gap-2 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <div class="bg-white border rounded-md shadow-sm">
        <div class="p-4 border-b">
            <h1 class="text-xl font-semibold">Add Image</h1>
        </div>
        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="p-4 space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1">Title (optional)</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Caption (optional)</label>
                <input type="text" name="caption" value="{{ old('caption') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Image</label>
                <input type="file" name="image" accept="image/*" required class="w-full border rounded px-3 py-2">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Context</label>
                    <select name="context_type" class="w-full border rounded px-3 py-2">
                        <option value="">General</option>
                        <option value="trainings" {{ old('context_type')==='trainings' ? 'selected' : '' }}>Trainings</option>
                        <option value="history" {{ old('context_type')==='history' ? 'selected' : '' }}>History</option>
                        <option value="event" {{ old('context_type')==='event' ? 'selected' : '' }}>Event</option>
                        <option value="csr" {{ old('context_type')==='csr' ? 'selected' : '' }}>CSR</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Reference (slug or id)</label>
                    <input type="text" name="context_slug" value="{{ old('context_slug') }}" class="w-full border rounded px-3 py-2" placeholder="e.g. event-slug or history-id">
                </div>
            </div>

            <div class="pt-2">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection


