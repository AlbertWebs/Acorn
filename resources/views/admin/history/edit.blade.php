@extends('layouts.admin')

@section('title', 'Edit History')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Edit History Entry</h2>
        <a href="{{ route('admin.history.index') }}" class="text-blue-600 hover:underline">← Back to List</a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul class="list-disc pl-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.history.update', $history) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold mb-1">Year <span class="text-red-500">*</span></label>
                <input type="number" name="year" value="{{ old('year', $history->year) }}" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block font-semibold mb-1">Step Number</label>
                <input type="text" name="step_number" value="{{ old('step_number', $history->step_number) }}" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="e.g. 01.">
            </div>

            <div class="md:col-span-2">
                <label class="block font-semibold mb-1">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $history->title) }}" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="md:col-span-2">
                <label class="block font-semibold mb-1">Description</label>
                <textarea name="description" rows="5" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">{{ old('description', $history->description) }}</textarea>
            </div>

            <div>
                <label class="block font-semibold mb-1">Order</label>
                <input type="number" name="order" value="{{ old('order', $history->order) }}" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block font-semibold mb-1">Image One</label>
                <input type="file" name="image_one" accept="image/*" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                @if ($history->image_one)
                    <div class="mt-3">
                        <p class="text-sm text-gray-600 mb-1">Current Image:</p>
                        <img src="{{ asset('storage/' . $history->image_one) }}" alt="Image One" class="w-32 h-32 object-cover rounded-lg border">
                    </div>
                @endif
            </div>

            <div>
                <label class="block font-semibold mb-1">Image Two</label>
                <input type="file" name="image_two" accept="image/*" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                @if ($history->image_two)
                    <div class="mt-3">
                        <p class="text-sm text-gray-600 mb-1">Current Image:</p>
                        <img src="{{ asset('storage/' . $history->image_two) }}" alt="Image Two" class="w-32 h-32 object-cover rounded-lg border">
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-8">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold">Update History</button>
        </div>
    </form>
</div>
@endsection
