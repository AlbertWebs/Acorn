@extends('layouts.admin')

@section('title', 'Meet Our Founder')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">

    <!-- Header Section -->
    <div class="flex justify-between items-center mb-10 border-b pb-6">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-800 mb-1">{!! $founder->title !!}</h1>
            <h2 class="text-2xl text-blue-700 font-semibold">{!! $founder->name !!}</h2>
            <p class="text-gray-600 italic mt-2">{!! $founder->roles !!}</p>
        </div>

        <a href="{{ route('admin.founder.edit') }}"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow-md transition duration-200">
            <i class="fas fa-edit"></i>
            <span>Edit</span>
        </a>
    </div>

    <!-- Profile Sections -->
    <div class="space-y-8">

        <!-- About Section -->
        <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition p-6 border border-gray-100">
            <h3 class="text-xl font-semibold text-gray-800 mb-3 flex items-center gap-2">
                <i class="fas fa-user text-blue-600"></i>
                About Eva
            </h3>
            <div class="prose max-w-none text-gray-700 leading-relaxed">
                {!! $founder->about !!}
            </div>
        </div>

        <!-- Catalyst for Change -->
        <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition p-6 border border-gray-100">
            <h3 class="text-xl font-semibold text-gray-800 mb-3 flex items-center gap-2">
                <i class="fas fa-bolt text-blue-600"></i>
                A Catalyst for Change
            </h3>
            <div class="prose max-w-none text-gray-700 leading-relaxed">
                {!! $founder->catalyst_for_change !!}
            </div>
        </div>

        <!-- Community Impact -->
        <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition p-6 border border-gray-100">
            <h3 class="text-xl font-semibold text-gray-800 mb-3 flex items-center gap-2">
                <i class="fas fa-hands-helping text-blue-600"></i>
                Community Impact
            </h3>
            <div class="prose max-w-none text-gray-700 leading-relaxed">
                {!! $founder->community_impact !!}
            </div>
        </div>

        <!-- Ubuntu in Leadership -->
        <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition p-6 border border-gray-100">
            <h3 class="text-xl font-semibold text-gray-800 mb-3 flex items-center gap-2">
                <i class="fas fa-users text-blue-600"></i>
                Ubuntu in Leadership
            </h3>
            <div class="prose max-w-none text-gray-700 leading-relaxed">
                {!! $founder->leadership !!}
            </div>
        </div>

    </div>
</div>
@endsection
