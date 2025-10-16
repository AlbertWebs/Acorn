@extends('layouts.admin')

@section('title', 'Company History')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Company History</h2>
        <a href="{{ route('admin.history.create') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-md text-sm font-medium transition">
            + Add New
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-700 text-sm uppercase tracking-wider">
                    <th class="px-4 py-3 border-b">Year</th>
                    <th class="px-4 py-3 border-b">Title</th>
                    <th class="px-4 py-3 border-b">Order</th>
                    <th class="px-4 py-3 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($histories as $history)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 text-gray-800">{{ $history->year }}</td>
                        <td class="px-4 py-3 text-gray-700 font-medium">{{ $history->title }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $history->order }}</td>
                        <td class="px-4 py-3 text-center space-x-3">
                            <a href="{{ route('admin.history.edit', $history) }}"
                               class="text-indigo-600 hover:text-indigo-800 font-medium">
                                Edit
                            </a>
                            <form action="{{ route('admin.history.destroy', $history) }}"
                                  method="POST" class="inline"
                                  onsubmit="return confirm('Are you sure you want to delete this history item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800 font-medium">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                            No history records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
