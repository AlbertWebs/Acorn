@extends('layouts.admin')

@section('title', 'Manage Services')
@section('page-title', 'Services')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 flex items-center gap-2">
            <i class="fas fa-cogs text-blue-600"></i> Services
        </h2>
        <a href="{{ route('admin.services.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition flex items-center gap-2">
            <i class="fas fa-plus-circle"></i> Add Service
        </a>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-xl shadow-lg border border-gray-100">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="py-3 px-4 text-left border-b">#</th>
                    <th class="py-3 px-4 text-left border-b">Title</th>
                    <th class="py-3 px-4 text-left border-b">Image</th>
                    <th class="py-3 px-4 text-left border-b">SEO</th>
                    <th class="py-3 px-4 text-left border-b">Status</th>
                    <th class="py-3 px-4 text-left border-b">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($services as $service)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4 border-b">{{ $loop->iteration }}</td>

                        <td class="py-3 px-4 border-b font-medium">{{ $service->title }}</td>

                        <td class="py-3 px-4 border-b">
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}"
                                     alt="Service Image"
                                     class="w-16 h-16 object-cover rounded-md">
                            @else
                                <span class="text-gray-400 text-sm">No image</span>
                            @endif
                        </td>

                        <!-- SEO Summary -->
                        <td class="py-3 px-4 border-b">
                            @if($service->seo_title || $service->seo_description)
                                <div class="relative group">
                                    <span class="text-blue-600 cursor-pointer text-sm" title="Hover for details">
                                        <i class="fas fa-search"></i> Optimized
                                    </span>
                                    <div class="hidden group-hover:block absolute z-10 bg-white border border-gray-300 rounded-md shadow-md p-3 w-64 text-xs text-gray-700 -top-2 left-20">
                                        <strong>Title:</strong> {{ Str::limit($service->seo_title, 50) }}<br>
                                        <strong>Description:</strong> {{ Str::limit($service->seo_description, 80) }}<br>
                                        <strong>Keywords:</strong> {{ Str::limit($service->seo_keywords, 60) }}
                                    </div>
                                </div>
                            @else
                                <span class="text-gray-400 text-sm">Not set</span>
                            @endif
                        </td>

                        <!-- Status -->
                        <td class="py-3 px-4 border-b">
                            @if($service->is_active)
                                <span class="inline-block px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Active</span>
                            @else
                                <span class="inline-block px-3 py-1 text-xs font-semibold text-gray-800 bg-gray-200 rounded-full">Inactive</span>
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="py-3 px-4 border-b flex gap-2">
                            <a href="{{ route('admin.services.edit', $service) }}"
                               class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-sm transition">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this service?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded-md text-sm transition">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-6 text-center text-gray-500">No services found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
