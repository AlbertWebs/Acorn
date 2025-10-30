@extends('layouts.admin')

@section('content')
<div class="max-w-12xl mx-auto p-6 bg-white rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold mb-6 flex items-center gap-2 text-gray-800">
        <i class="fas fa-calendar text-blue-600"></i> Edit Event
    </h2>

    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Title</label>
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
                <span class="px-3 text-gray-500 bg-gray-50"><i class="fas fa-heading"></i></span>
                <input type="text" name="title" value="{{ old('title', $event->title) }}" placeholder="Enter event title"
                       class="w-full p-2 outline-none focus:ring-0" required>
            </div>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Author</label>
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
                <span class="px-3 text-gray-500 bg-gray-50"><i class="fas fa-user"></i></span>
                <input type="text" name="author" value="{{ old('author', $event->author) }}"
                       class="w-full p-2 outline-none">
            </div>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Excerpt</label>
            <div class="flex items-start border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
                <span class="px-3 py-2 text-gray-500 bg-gray-50"><i class="fas fa-align-left"></i></span>
                <textarea name="excerpt" rows="3" placeholder="Short summary for preview..."
                          class="w-full p-2 outline-none focus:ring-0">{{ old('excerpt', $event->excerpt) }}</textarea>
            </div>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Event Date</label>
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
                <span class="px-3 text-gray-500 bg-gray-50"><i class="fas fa-calendar-day"></i></span>
                <input type="date" name="event_date" value="{{ old('event_date', optional($event->event_date)->toDateString()) }}" class="w-full p-2 outline-none focus:ring-0">
            </div>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Event Time</label>
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
                <span class="px-3 text-gray-500 bg-gray-50"><i class="fas fa-clock"></i></span>
                <input type="time" name="event_time" value="{{ old('event_time', $event->event_time) }}" class="w-full p-2 outline-none focus:ring-0" step="900">
            </div>
            <p class="text-xs text-gray-500 mt-1">Optional. Set HH:MM to reserve that hour in the calendar.</p>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Content</label>
            <div class="border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
                <textarea id="content-editor" name="content" placeholder="Describe the event in detail..." required>{{ old('content', $event->content) }}</textarea>
            </div>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Featured Image</label>
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-300">
                <span class="px-3 text-gray-500 bg-gray-50"><i class="fas fa-image"></i></span>
                <input type="file" name="featured_image" class="w-full p-2 outline-none focus:ring-0">
            </div>
            @if($event->featured_image)
                <p class="text-sm text-gray-500 mt-2">Current: <img src="{{ asset('storage/'.$event->featured_image) }}" alt="" class="h-16 inline-block rounded"></p>
            @endif
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Status</label>
            <label class="inline-flex items-center gap-2">
                <input type="hidden" name="is_published" value="0">
                <input type="checkbox" name="is_published" value="1" class="rounded" {{ old('is_published', $event->is_published) ? 'checked' : '' }}>
                <span>Publish this event</span>
            </label>
        </div>

        <div class="pt-4">
            <button class="w-full bg-blue-600 text-white font-semibold px-5 py-3 rounded-lg shadow-md hover:bg-blue-700 transition">
                <i class="fas fa-save mr-2"></i> Update Event
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    tinymce.init({
        selector: '#content-editor',
        height: 400,
        menubar: true,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | bullist numlist | link image | fullscreen | code',
        branding: false,
        promotion: false,
        setup: function (editor) { editor.on('change', function () { editor.save(); }); }
    });
});
</script>
@endsection


