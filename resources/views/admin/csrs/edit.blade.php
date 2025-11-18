@extends('layouts.admin')

@section('content')
<div class="max-w-12xl mx-auto p-6 bg-white rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold mb-6 flex items-center gap-2 text-gray-800">
        <i class="fas fa-edit text-blue-600"></i> Edit CSR
    </h2>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.csrs.update', $csr) }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="csr-update-form">
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

        <!-- Gallery Images Selection -->
        <div>
            <label class="block mb-2 font-semibold text-gray-700">Gallery Images</label>
            <p class="text-sm text-gray-500 mb-4">Select images from the CSR gallery to link to this CSR. <a href="{{ route('admin.galleries.index') }}?context_type=csr" target="_blank" class="text-blue-600 hover:underline">Manage CSR Gallery</a></p>
            
            @php
                // Show images with context_type='csr' OR no context_type (unassigned)
                // This allows selecting CSR images or linking new images to CSR
                $allGalleryImages = \App\Models\Gallery::where('is_active', true)
                    ->where(function($query) {
                        $query->where('context_type', 'csr')
                              ->orWhereNull('context_type');
                    })
                    ->latest()
                    ->get();
                $linkedImageIds = $galleryImages->pluck('id')->toArray();
            @endphp
            
            @if($allGalleryImages->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 max-h-96 overflow-y-auto border border-gray-200 rounded-lg p-4">
                    @foreach($allGalleryImages as $image)
                        <div class="relative">
                            <label class="cursor-pointer">
                                <input type="checkbox" name="gallery_images[]" value="{{ $image->id }}" 
                                       {{ in_array($image->id, $linkedImageIds) ? 'checked' : '' }}
                                       class="sr-only gallery-image-checkbox">
                                <div class="relative border-2 rounded-lg overflow-hidden transition-all 
                                    {{ in_array($image->id, $linkedImageIds) ? 'border-blue-500 ring-2 ring-blue-300' : 'border-gray-200 hover:border-gray-300' }}">
                                    <img src="{{ asset('storage/' . $image->image) }}" 
                                         alt="{{ $image->title ?? 'Gallery Image' }}" 
                                         class="w-full h-24 object-cover">
                                    @if(in_array($image->id, $linkedImageIds))
                                        <div class="absolute top-1 right-1 bg-blue-500 text-white rounded-full p-1">
                                            <i class="fas fa-check text-xs"></i>
                                        </div>
                                    @endif
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
                <p class="text-sm text-gray-500 mt-2">{{ count($linkedImageIds) }} image(s) currently linked to this CSR.</p>
            @else
                <div class="border border-gray-200 rounded-lg p-8 text-center">
                    <p class="text-gray-500">No gallery images available. <a href="{{ route('admin.galleries.create') }}" target="_blank" class="text-blue-600 hover:underline">Add images to gallery first</a>.</p>
                </div>
            @endif
        </div>

        <!-- Active Status -->
        <div>
            <label class="flex items-center gap-2">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $csr->is_active) ? 'checked' : '' }} class="rounded">
                <span class="font-semibold text-gray-700">Active</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-4 relative z-10">
            <button type="submit" id="update-csr-btn" class="w-full bg-blue-600 text-white font-semibold px-5 py-3 rounded-lg shadow-md hover:bg-blue-700 transition cursor-pointer relative z-10" style="pointer-events: auto; position: relative;">
                <i class="fas fa-save mr-2"></i> Update CSR
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // TinyMCE initialization
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
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            },
        });
    }

    // Ensure TinyMCE content is saved before form submission
    const form = document.getElementById('csr-update-form');
    const updateBtn = document.getElementById('update-csr-btn');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            // Save TinyMCE content before submitting
            if (typeof tinymce !== 'undefined') {
                const editor = tinymce.get('description-editor');
                if (editor) {
                    editor.save();
                }
            }
            
            // Disable button to prevent double submission
            if (updateBtn) {
                updateBtn.disabled = true;
                updateBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Updating...';
            }
        });
    }
    
    // Handle gallery image checkbox clicks for visual feedback
    const checkboxes = document.querySelectorAll('.gallery-image-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const container = this.closest('div').querySelector('div');
            if (this.checked) {
                container.classList.add('border-blue-500', 'ring-2', 'ring-blue-300');
                container.classList.remove('border-gray-200');
            } else {
                container.classList.remove('border-blue-500', 'ring-2', 'ring-blue-300');
                container.classList.add('border-gray-200');
            }
        });
    });
});
</script>
@endsection

