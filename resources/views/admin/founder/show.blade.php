@extends('layouts.admin')

@section('title', 'Meet Our Founder')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 border-b pb-6">
        <div class="text-center md:text-left mb-6 md:mb-0">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-1">{!! $founder->title !!}</h1>
            <h2 class="text-2xl text-blue-700 font-semibold">{!! $founder->name !!}</h2>
            <p class="text-gray-600 italic mt-2">{!! $founder->roles !!}</p>

            <!-- Social Icons -->
            <div class="flex justify-center md:justify-start gap-4 mt-4">
                @if($founder->facebook)
                    <a href="{{ $founder->facebook }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-xl">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                @endif
                @if($founder->linkedin)
                    <a href="{{ $founder->linkedin }}" target="_blank" class="text-blue-700 hover:text-blue-900 text-xl">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                @endif
                @if($founder->instagram)
                    <a href="{{ $founder->instagram }}" target="_blank" class="text-pink-500 hover:text-pink-700 text-xl">
                        <i class="fab fa-instagram"></i>
                    </a>
                @endif
                @if($founder->twitter)
                    <a href="{{ $founder->twitter }}" target="_blank" class="text-sky-500 hover:text-sky-700 text-xl">
                        <i class="fab fa-x-twitter"></i>
                    </a>
                @endif
            </div>
        </div>

        <div class="flex flex-col items-center">
            @if($founder->image)
                <img src="{{ asset($founder->image) }}" alt="{{ $founder->name }}" class="w-40 h-40 object-cover rounded-full border-4 border-blue-600 shadow-md">
            @else
                <div class="w-40 h-40 flex items-center justify-center rounded-full bg-gray-100 border-2 border-gray-300 text-gray-500">
                    <i class="fas fa-user text-5xl"></i>
                </div>
            @endif

            <a href="{{ route('admin.founder.edit') }}"
                class="mt-4 inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow-md transition duration-200">
                <i class="fas fa-edit"></i>
                <span>Edit Profile</span>
            </a>
        </div>
    </div>

    <!-- Profile Sections -->
    <div class="space-y-8">

        <!-- About Section -->
        <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition p-6 border border-gray-100">
            <h3 class="text-xl font-semibold text-gray-800 mb-3 flex items-center gap-2">
                <i class="fas fa-user text-blue-600"></i>
                About {{ $founder->name }}
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
