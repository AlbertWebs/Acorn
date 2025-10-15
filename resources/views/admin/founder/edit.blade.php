@extends('layouts.admin')
@section('title', 'Edit Founder Profile')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow rounded-lg">
    <h2 class="text-xl font-bold mb-4">Edit Founder Profile</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.founder.update') }}">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-4">
            <label class="block font-semibold">Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded" value="{{ old('name', $founder->name) }}" required>
        </div>

        <!-- Title -->
        <div class="mb-4">
            <label class="block font-semibold">Title</label>
            <input type="text" name="title" class="w-full border p-2 rounded" value="{{ old('title', $founder->title) }}">
        </div>

        <!-- Roles -->
        <div class="mb-4">
            <label class="block font-semibold">Roles</label>
            <input type="text" name="roles" class="w-full border p-2 rounded" value="{{ old('roles', $founder->roles) }}">
        </div>

        <!-- About -->
        <div class="mb-4">
            <label class="block font-semibold">About</label>
            <textarea name="about" rows="6" class="editor w-full border p-2 rounded">{{ old('about', $founder->about) }}</textarea>
        </div>

        <!-- Catalyst for Change -->
        <div class="mb-4">
            <label class="block font-semibold">Catalyst for Change</label>
            <textarea name="catalyst_for_change" rows="6" class="editor w-full border p-2 rounded">{{ old('catalyst_for_change', $founder->catalyst_for_change) }}</textarea>
        </div>

        <!-- Community Impact -->
        <div class="mb-4">
            <label class="block font-semibold">Community Impact</label>
            <textarea name="community_impact" rows="6" class="editor w-full border p-2 rounded">{{ old('community_impact', $founder->community_impact) }}</textarea>
        </div>

        <!-- Leadership -->
        <div class="mb-4">
            <label class="block font-semibold">Leadership</label>
            <textarea name="leadership" rows="6" class="editor w-full border p-2 rounded">{{ old('leadership', $founder->leadership) }}</textarea>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" type="submit">
            Update Profile
        </button>
    </form>
</div>

{{-- CKEditor 5 CDN --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    // Apply CKEditor to all textareas with class="editor"
    document.querySelectorAll('.editor').forEach((textarea) => {
        ClassicEditor
            .create(textarea)
            .catch(error => {
                console.error('CKEditor error:', error);
            });
    });
</script>
@endsection
