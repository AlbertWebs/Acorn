@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">CSR Management</h2>
        <a href="{{ route('admin.csrs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            <i class="fas fa-plus mr-2"></i>Add New CSR
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full border border-gray-200 rounded-lg shadow-sm">
        <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
            <tr>
                <th class="p-3 text-left">Title</th>
                <th class="p-3 text-left">Description</th>
                <th class="p-3 text-left">PDF</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($csrs as $csr)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3 font-medium">{{ $csr->title }}</td>
                    <td class="p-3">{{ $csr->description ? \Str::limit(strip_tags($csr->description), 50) : 'N/A' }}</td>
                    <td class="p-3">
                        @if($csr->pdf_file)
                            <a href="{{ asset('storage/' . $csr->pdf_file) }}" target="_blank" class="text-blue-500 hover:underline">
                                <i class="fas fa-file-pdf mr-1"></i>View PDF
                            </a>
                        @else
                            <span class="text-gray-400">No PDF</span>
                        @endif
                    </td>
                    <td class="p-3">
                        <span class="px-2 py-1 text-xs rounded {{ $csr->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-600' }}">
                            {{ $csr->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="p-3 flex gap-3">
                        <a href="{{ route('admin.csrs.edit', $csr) }}" class="text-blue-500 hover:underline">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </a>
                        <form action="{{ route('admin.csrs.destroy', $csr) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this CSR?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">
                                <i class="fas fa-trash mr-1"></i>Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($csrs->isEmpty())
        <div class="text-center py-8 text-gray-500">
            <p>No CSR entries yet. <a href="{{ route('admin.csrs.create') }}" class="text-blue-500 hover:underline">Create one now</a></p>
        </div>
    @endif
</div>
@endsection

