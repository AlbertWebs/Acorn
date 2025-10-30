@extends('layouts.admin')

@section('title','Gallery')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Gallery</h1>
        <a href="{{ route('admin.galleries.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
            <i class="fa-solid fa-plus"></i>
            <span>Add Image</span>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-md border shadow-sm">
            <div class="p-4 border-b">
                <h2 class="font-semibold">Bulk Upload (Dropzone)</h2>
                <p class="text-sm text-gray-500">Drag & drop images or click to upload. Max 5MB per image.</p>
            </div>
            <div class="p-4">
                <form action="{{ route('admin.galleries.upload') }}" method="post" enctype="multipart/form-data" class="dropzone border-2 border-dashed border-gray-300 rounded-md bg-gray-50" id="gallery-dropzone" style="min-height:200px;">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-3">
                        <div>
                            <label class="block text-sm font-medium mb-1">Context</label>
                            <select name="context_type" class="w-full border rounded px-3 py-2">
                                <option value="">General</option>
                                <option value="trainings">Trainings</option>
                                <option value="history">History</option>
                                <option value="event">Event</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Reference (slug or id)</label>
                            <input type="text" name="context_slug" class="w-full border rounded px-3 py-2" placeholder="e.g. event-slug or history-id">
                        </div>
                    </div>
                    <div class="dz-message text-center text-gray-600 m-0">
                        <div class="flex flex-col items-center gap-2 py-8">
                            <i class="fa-regular fa-images text-3xl text-gray-400"></i>
                            <p><strong>Drop images here</strong> or click to upload</p>
                            <p class="text-xs">JPG, PNG, GIF • Max 5MB</p>
                        </div>
                    </div>
                    <div id="dz-fallback" class="text-center py-4">
                        <input type="file" name="file" accept="image/*" class="inline-block border rounded px-3 py-2 cursor-pointer">
                        <button type="submit" class="inline-block ml-2 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Upload</button>
                    </div>
                </form>
                <div id="dz-status" class="mt-3 text-sm text-gray-600"></div>
            </div>
        </div>

        <div class="bg-white rounded-md border shadow-sm">
            <div class="p-4 border-b">
                <h2 class="font-semibold">All Images</h2>
            </div>
            <div class="p-0 overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left px-4 py-2">Image</th>
                            <th class="text-left px-4 py-2">Title</th>
                            <th class="text-left px-4 py-2">Caption</th>
                            <th class="text-left px-4 py-2">Status</th>
                            <th class="text-left px-4 py-2">Added</th>
                            <th class="text-left px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr class="border-t">
                                <td class="px-4 py-2">
                                    <img src="{{ asset('storage/'.$item->image) }}" alt="" class="h-14 w-20 object-cover rounded">
                                </td>
                                <td class="px-4 py-2">{{ $item->title }}</td>
                                <td class="px-4 py-2">{{ $item->caption }}</td>
                                <td class="px-4 py-2">
                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs {{ $item->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                        {{ $item->is_active ? 'Active' : 'Hidden' }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">{{ $item->created_at?->format('Y-m-d') }}</td>
                                <td class="px-4 py-2 space-x-2">
                                    <a href="{{ route('admin.galleries.edit', $item) }}" class="inline-flex items-center gap-1 text-indigo-600 hover:underline"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                                    <form action="{{ route('admin.galleries.destroy', $item) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete this image?')" class="inline-flex items-center gap-1 text-red-600 hover:underline"><i class="fa-regular fa-trash-can"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-gray-500">No images yet. Use Dropzone to upload.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t">
                {{ $items->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Dropzone CSS/JS (no SRI to avoid blocking) -->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css">
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        Dropzone.autoDiscover = false;
        const fallback = document.getElementById('dz-fallback');
        const status = document.getElementById('dz-status');
        if (!window.Dropzone) {
            if (status) status.textContent = 'Dropzone library failed to load. Using basic upload.';
            if (fallback) fallback.style.display = 'block';
            return;
        }
        if (fallback) fallback.style.display = 'none';

        const dz = new Dropzone('#gallery-dropzone', {
            url: '{{ route('admin.galleries.upload') }}',
            method: 'post',
            paramName: 'file',
            maxFilesize: 5,
            acceptedFiles: 'image/*',
            parallelUploads: 2,
            timeout: 120000,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest'
            },
            params: { _token: '{{ csrf_token() }}' },
            dictDefaultMessage: 'Drop images here or click to upload',
            init: function(){
                this.on('sending', function(file){
                    if (status) status.textContent = 'Uploading "' + file.name + '"...';
                });
                this.on('success', function(file){
                    if (status) status.textContent = 'Uploaded: ' + file.name;
                    setTimeout(() => window.location.reload(), 400);
                });
                this.on('error', function(file, message, xhr){
                    if (status) status.textContent = 'Error uploading ' + file.name + ': ' + (message && message.message ? message.message : (typeof message === 'string' ? message : 'Unknown error'));
                    if (xhr && xhr.status === 419 && status) status.textContent += ' (Session expired. Refresh and try again)';
                    if (xhr && xhr.status === 413 && status) status.textContent += ' (File too large. Increase PHP upload_max_filesize/post_max_size)';
                });
                // Attach dynamic context fields on sending
                this.on('sending', function(file, xhr, formData) {
                    const form = document.getElementById('gallery-dropzone');
                    const ctx = form.querySelector('select[name="context_type"]').value;
                    const ref = form.querySelector('input[name="context_slug"]').value;
                    if (ctx) formData.append('context_type', ctx);
                    if (ref) formData.append('context_slug', ref);
                });
            }
        });
    });
</script>
@endsection


