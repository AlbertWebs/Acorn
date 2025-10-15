@extends('layouts.admin')
@section('title', 'Meet Our Founder')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">

    <!-- Header Section -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-800 mb-1">{{ $founder->title }}</h1>
            <h2 class="text-2xl text-blue-700 font-semibold">{{ $founder->name }}</h2>
            <p class="text-gray-600 italic mt-2">{{ $founder->roles }}</p>
        </div>
        <a href="{{ route('admin.founder.edit') }}"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow transition">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>

    <!-- Profile Sections -->
    <div class="space-y-6">

        <!-- About Section -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">About Eva</h3>
            <p class="text-gray-700 leading-relaxed">{{ $founder->about }}</p>
        </div>

        <!-- Catalyst for Change -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">A Catalyst for Change</h3>
            <p class="text-gray-700 leading-relaxed">{{ $founder->catalyst_for_change }}</p>
        </div>

        <!-- Community Impact -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Community Impact</h3>
            <p class="text-gray-700 leading-relaxed">{{ $founder->community_impact }}</p>
        </div>

        <!-- Ubuntu in Leadership -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Ubuntu in Leadership</h3>
            <p class="text-gray-700 leading-relaxed">{{ $founder->leadership }}</p>
        </div>

    </div>
</div>
@endsection
