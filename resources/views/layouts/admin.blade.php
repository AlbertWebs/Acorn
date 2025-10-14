<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'Admin Panel')</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<?php $Settings = DB::table('settings')->first(); ?>

<body class="min-h-screen bg-gray-100" x-data="{ sidebarOpen: false }">
  <div class="flex h-screen">

    <!-- Sidebar (collapsible) -->
    <aside
      :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
      class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-white border-r shadow-md transform transition-transform duration-300 ease-in-out"
    >
      <div class="p-4 border-b flex items-center justify-between">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
          <div class="text-lg font-bold text-gray-800">Acorn Special Tutorials</div>
        </a>
        <!-- Close button (mobile only) -->
        <button @click="sidebarOpen = false" class="lg:hidden text-gray-600 hover:text-gray-800">
          <i class="fa-solid fa-xmark text-xl"></i>
        </button>
      </div>

      <div class="px-2 py-2">
        <img src="{{ asset('storage/'.$Settings->logo) }}" alt="Logo" class="h-10 w-auto mx-auto mb-4">
      </div>

      @include('admin.sidebar')
    </aside>

    <!-- Overlay (for mobile) -->
    <div
      x-show="sidebarOpen"
      @click="sidebarOpen = false"
      x-transition.opacity
      class="fixed inset-0 bg-black bg-opacity-40 z-40 lg:hidden">
    </div>

    <!-- Main content -->
    <main class="flex-1 overflow-auto">
      <div class="p-6">

        <!-- Header -->
        <header class="mb-6 flex items-center justify-between">
          <div class="flex items-center gap-3">
            <!-- Toggle Button -->
            <button
              @click="sidebarOpen = !sidebarOpen"
              class="lg:hidden p-2 rounded-md border border-gray-300 bg-white hover:bg-gray-100"
            >
              <i class="fa-solid fa-bars text-gray-700"></i>
            </button>

            <h1 class="text-2xl font-semibold text-gray-800">
              @yield('page-title', 'Dashboard')
            </h1>
          </div>

          <!-- User Dropdown -->
          <div class="relative" x-data="{ open: false }">
            <button
              @click="open = !open"
              class="flex items-center gap-2 px-3 py-2 bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none"
            >
              <span class="text-sm text-gray-700">Welcome, {{ auth()->user()->name }}</span>
              <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </button>

            <!-- Dropdown menu -->
            <div
              x-show="open"
              @click.away="open = false"
              x-transition
              class="absolute right-0 mt-2 w-52 bg-white border border-gray-200 rounded-md shadow-lg py-1 z-50"
            >
              <a href="{{ route('profile.edit') }}"
                 class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                <i class="fa-regular fa-user text-gray-500"></i> Profile
              </a>

              <a href="{{ route('admin.settings') ?? '#' }}"
                 class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                <i class="fa-solid fa-gear text-gray-500"></i> Settings
              </a>

              <a href="{{ route('admin.users.index') ?? '#' }}"
                 class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                <i class="fa-solid fa-users text-gray-500"></i> Users
              </a>

              <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"
                        class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                  <i class="fa-solid fa-right-from-bracket text-red-500"></i> Logout
                </button>
              </form>
            </div>
          </div>
        </header>

        <section>
          @yield('content')
        </section>
      </div>
    </main>
  </div>

  <script src="https://unpkg.com/alpinejs@3" defer></script>
</body>
</html>
