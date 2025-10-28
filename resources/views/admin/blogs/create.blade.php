@extends('layouts.admin')

@section('content')
<div class="max-w-12xl mx-auto p-6 bg-white rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold mb-6 flex items-center gap-2 text-gray-800">
        <i class="fas fa-pen-nib text-blue-600"></i> Add Blog Post
    </h2>

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Title -->
        <div>
            <label class="block mb-2 font-semibold text-gray-700">Title</label>
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
                <span class="px-3 text-gray-500 bg-gray-50"><i class="fas fa-heading"></i></span>
                <input type="text" name="title" placeholder="Enter blog title"
                       class="w-full p-2 outline-none focus:ring-0" required>
            </div>
        </div>

        <!-- Author (Auto-filled) -->
        <div>
            <label class="block mb-2 font-semibold text-gray-700">Author</label>
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
                <span class="px-3 text-gray-500 bg-gray-50"><i class="fas fa-user"></i></span>
                <input type="text" name="author" value="{{ auth()->user()->name ?? '' }}"
                       class="w-full p-2 outline-none bg-gray-100 text-gray-600" readonly>
            </div>
        </div>

        <!-- Excerpt -->
        <div>
            <label class="block mb-2 font-semibold text-gray-700">Excerpt</label>
            <div class="flex items-start border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
                <span class="px-3 py-2 text-gray-500 bg-gray-50"><i class="fas fa-align-left"></i></span>
                <textarea name="excerpt" rows="3" placeholder="Short summary for preview..."
                          class="w-full p-2 outline-none focus:ring-0"></textarea>
            </div>
        </div>

        <!-- Content -->
        <div>
            <label class="block mb-2 font-semibold text-gray-700">Content</label>
            <div class="border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
                <textarea id="content-editor" name="content" placeholder="Write your full article here..." required></textarea>
            </div>
        </div>

        <!-- Featured Image -->
        <div>
            <label class="block mb-2 font-semibold text-gray-700">Featured Image</label>
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
                <span class="px-3 text-gray-500 bg-gray-50"><i class="fas fa-image"></i></span>
                <input type="file" name="featured_image"
                       class="w-full p-2 outline-none focus:ring-0">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button class="w-full bg-blue-600 text-white font-semibold px-5 py-3 rounded-lg shadow-md hover:bg-blue-700 transition">
                <i class="fas fa-save mr-2"></i> Save Post
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    tinymce.init({
        selector: '#content-editor',
        height: 500,
        menubar: true,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount', 'emoticons',
            'template', 'codesample', 'hr', 'pagebreak', 'nonbreaking', 'toc',
            'imagetools', 'textpattern', 'noneditable', 'quickbars', 'accordion'
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic forecolor backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help | image | link | code | fullscreen | ' +
            'searchreplace | table | emoticons | template | codesample',
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; }',
        branding: false,
        promotion: false,
        resize: true,
        elementpath: true,
        statusbar: true,
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        },
        // Image upload configuration
        images_upload_handler: function (blobInfo, success, failure) {
            // For now, we'll use a simple base64 approach
            // In production, you might want to upload to a server
            var reader = new FileReader();
            reader.onload = function() {
                success(reader.result);
            };
            reader.readAsDataURL(blobInfo.blob());
        },
        // Custom styles
        content_css: false,
        // Language
        language: 'en',
        // Accessibility
        accessibility_focus: true,
        // Auto-save
        autosave_ask_before_unload: true,
        // Templates
        templates: [
            {
                title: 'Blog Post Template',
                description: 'A basic blog post template',
                content: '<h2>Introduction</h2><p>Start your blog post with an engaging introduction...</p><h2>Main Content</h2><p>Add your main content here...</p><h2>Conclusion</h2><p>Wrap up your post with a conclusion...</p>'
            }
        ]
    });
});
</script>
@endsection
