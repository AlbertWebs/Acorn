@extends('layouts.admin')

@section('content')
<div class="max-w-12xl mx-auto p-6 bg-white rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold mb-6 flex items-center gap-2 text-gray-800">
        <i class="fas fa-edit text-blue-600"></i> Edit CSR
    </h2>

    <form action="{{ route('admin.csrs.update', $csr) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div>
            <label class="block mb-2 font-semibold text-gray-700">Title <span class="text-red-500">*</span></label>
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
                <span class="px-3 text-gray-500 bg-gray-50"><i class="fas fa-heading"></i></span>
                <input type="text" name="title" placeholder="Enter CSR title"
                       class="w-full p-2 outline-none focus:ring-0" required value="{{ old('title', $csr->title) }}">
            </div>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label class="block mb-2 font-semibold text-gray-700">Description</label>
            <div class="border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
                <textarea id="description-editor" name="description" placeholder="Enter CSR description..." rows="10">{{ old('description', $csr->description) }}</textarea>
            </div>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- PDF Upload -->
        <div>
            <label class="block mb-2 font-semibold text-gray-700">PDF File</label>
            @if($csr->pdf_file)
                <div class="mb-2 p-2 bg-gray-50 rounded border">
                    <a href="{{ asset('storage/' . $csr->pdf_file) }}" target="_blank" class="text-blue-500 hover:underline">
                        <i class="fas fa-file-pdf mr-1"></i>Current PDF: {{ basename($csr->pdf_file) }}
                    </a>
                </div>
            @endif
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
                <span class="px-3 text-gray-500 bg-gray-50"><i class="fas fa-file-pdf"></i></span>
                <input type="file" name="pdf_file" accept=".pdf"
                       class="w-full p-2 outline-none focus:ring-0">
            </div>
            <p class="text-sm text-gray-500 mt-1">Maximum file size: 10MB. Leave empty to keep current file.</p>
            @error('pdf_file')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gallery Images with Dropzone -->
        <div>
            <label class="block mb-2 font-semibold text-gray-700">Gallery Images</label>
            <div class="bg-white rounded-md border shadow-sm mb-4">
                <div class="p-4 border-b">
                    <h3 class="font-semibold">Upload Gallery Images (Dropzone)</h3>
                    <p class="text-sm text-gray-500">Drag & drop images or click to upload. Max 5MB per image.</p>
                </div>
                <div class="p-4">
                    <form action="{{ route('admin.csrs.gallery.upload', $csr) }}" method="post" enctype="multipart/form-data" 
                          class="dropzone border-2 border-dashed border-gray-300 rounded-md bg-gray-50" 
                          id="csr-gallery-dropzone" style="min-height:200px;">
                        @csrf
                        <div class="dz-message text-center text-gray-600 m-0">
                            <div class="flex flex-col items-center gap-2 py-8">
                                <i class="fa-regular fa-images text-3xl text-gray-400"></i>
                                <p><strong>Drop images here</strong> or click to upload</p>
                                <p class="text-xs">JPG, PNG, GIF • Max 5MB</p>
                            </div>
                        </div>
                    </form>
                    <div id="dz-status" class="mt-3 text-sm text-gray-600"></div>
                </div>
            </div>

            <!-- Existing Gallery Images -->
            @if($galleryImages->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                    @foreach($galleryImages as $image)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $image->image) }}" alt="Gallery Image" 
                                 class="w-full h-32 object-cover rounded border">
                            <form action="{{ route('admin.csrs.gallery.delete', $image) }}" method="POST" class="absolute top-2 right-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this image?')" 
                                        class="bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition">
                                    <i class="fas fa-times text-xs"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-gray-500 mt-2">No gallery images yet. Upload images using the dropzone above.</p>
            @endif
        </div>

        <!-- Active Status -->
        <div>
            <label class="flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $csr->is_active) ? 'checked' : '' }} class="rounded">
                <span class="font-semibold text-gray-700">Active</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit" class="w-full bg-blue-600 text-white font-semibold px-5 py-3 rounded-lg shadow-md hover:bg-blue-700 transition">
                <i class="fas fa-save mr-2"></i> Update CSR
            </button>
        </div>
    </form>
</div>

<!-- Dropzone CSS/JS -->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css">
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // TinyMCE for description
    if (typeof tinymce !== 'undefined') {
        tinymce.init({
            selector: '#description-editor',
            height: 400,
            menubar: true,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic forecolor backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help | link | code',
            content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; }',
            branding: false,
            promotion: false,
        });
    }

    // Dropzone for gallery images
    Dropzone.autoDiscover = false;
    const status = document.getElementById('dz-status');
    
    if (!window.Dropzone) {
        if (status) status.textContent = 'Dropzone library failed to load. Please refresh the page.';
        return;
    }

    const dz = new Dropzone('#csr-gallery-dropzone', {
        url: '{{ route('admin.csrs.gallery.upload', $csr) }}',
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
            this.on('success', function(file, response){
                if (status) status.textContent = 'Uploaded: ' + file.name;
                setTimeout(() => window.location.reload(), 800);
            });
            this.on('error', function(file, message, xhr){
                if (status) status.textContent = 'Error uploading ' + file.name + ': ' + (message && message.message ? message.message : (typeof message === 'string' ? message : 'Unknown error'));
            });
        }
    });
});
</script>
@endsection

