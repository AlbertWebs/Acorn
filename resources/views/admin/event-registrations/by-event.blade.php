@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Registrations for: {{ $event->title }}</h2>
        <a href="{{ route('admin.event-registrations.index') }}" class="text-blue-600 hover:underline">All Registrations</a>
    </div>

    <table class="w-full border border-gray-200 rounded-lg shadow-sm">
        <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
            <tr>
                <th class="p-3 text-left">Name</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Phone</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Registered At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($registrations as $reg)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">{{ $reg->name }}</td>
                    <td class="p-3">{{ $reg->email }}</td>
                    <td class="p-3">{{ $reg->phone }}</td>
                    <td class="p-3">{{ ucfirst($reg->status) }}</td>
                    <td class="p-3">{{ $reg->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-6 text-center text-gray-500">No registrations yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $registrations->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection


