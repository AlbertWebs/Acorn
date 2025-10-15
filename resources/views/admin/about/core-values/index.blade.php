@extends('layouts.admin')

@section('title', 'Core Values')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Core Values</h1>
        <a href="{{ route('admin.core-values.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow transition">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 bg-green-100 text-green-800 border border-green-300 px-4 py-3 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-gray-700 font-semibold">#</th>
                    <th class="px-4 py-3 text-left text-gray-700 font-semibold">Title</th>
                    <th class="px-4 py-3 text-left text-gray-700 font-semibold">Description</th>
                    <th class="px-4 py-3 text-right text-gray-700 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($coreValues as $index => $value)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 font-semibold text-gray-800">{{ $value->title }}</td>
                        <td class="px-4 py-3 text-gray-600">{!! Str::limit(strip_tags($value->description), 80) !!}</td>
                        <td class="px-4 py-3 text-right space-x-2">
                            <a href="{{ route('admin.core-values.edit', $value->id) }}"
                               class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.core-values.destroy', $value->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800"
                                    onclick="return confirm('Are you sure you want to delete this?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-4 py-6 text-center text-gray-500">No core values yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
