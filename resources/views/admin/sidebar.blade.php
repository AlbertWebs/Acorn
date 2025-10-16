<nav class="p-4 space-y-2 overflow-y-auto h-full" x-data="{ activeDropdown: '' }">
    <ul class="space-y-2">

        <!-- Main Website -->
        <li>
            <a href="{{ route('home') }}" target="_blank"
               class="flex items-center gap-3 px-3 py-2 rounded-md border transition hover:bg-gray-100 hover:shadow-sm {{ Request::routeIs('admin.dashboard') ? 'bg-gray-100 font-semibold border-indigo-500' : 'border-gray-200' }}">
                <i class="fas fa-globe text-acorn"></i>
                <span class="sidebar-text">Main Website</span>
            </a>
        </li>

        <!-- Dashboard -->
        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-md border transition hover:bg-gray-100 hover:shadow-sm {{ Request::routeIs('admin.dashboard') ? 'bg-gray-100 font-semibold border-indigo-500' : 'border-gray-200' }}">
                <i class="fas fa-home text-acorn"></i>
                <span class="sidebar-text">Dashboard</span>
            </a>
        </li>

         <li>
            <a href="{{ route('admin.founder.show') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-md border transition hover:bg-gray-100 hover:shadow-sm {{ Request::routeIs('admin.dashboard') ? 'bg-gray-100 font-semibold border-indigo-500' : 'border-gray-200' }}">
                <i class="fas fa-user text-acorn"></i>
                <span class="sidebar-text">Founder</span>
            </a>
        </li>

        <!-- Simple Links -->
        @foreach ([
            ['route' => 'admin.carousel.index', 'icon' => 'fas fa-images', 'label' => 'Carousel'],
            ['route' => 'admin.about', 'icon' => 'fas fa-info-circle', 'label' => 'About Us'],
            ['route' => 'admin.purpose.edit', 'icon' => 'fas fa-info-circle', 'label' => 'Our Purpose'],
            ['route' => 'admin.core-values.index', 'icon' => 'fas fa-info-circle', 'label' => 'Our Core Values'],
            ['route' => 'admin.services.index', 'icon' => 'fas fa-wrench', 'label' => 'Services'],
            ['route' => 'admin.clients.index', 'icon' => 'fas fa-users', 'label' => 'Clients'],
            ['route' => 'admin.feedbacks.index', 'icon' => 'fas fa-comments', 'label' => 'Client Feedbacks'],
            ['route' => 'admin.blogs.index', 'icon' => 'fas fa-blog', 'label' => 'Blog Posts'],
            ['route' => 'admin.users.index', 'icon' => 'fas fa-user-cog', 'label' => 'Users'],
            ['route' => 'admin.subscribers.index', 'icon' => 'fas fa-envelope-open-text', 'label' => 'Subscribers'],
            ['route' => 'admin.sms.index', 'icon' => 'fas fa-sms', 'label' => 'SMS'],
            ['route' => 'admin.faq.index', 'icon' => 'fas fa-question', 'label' => 'FAQs'],
            ['route' => 'admin.settings', 'icon' => 'fas fa-cog', 'label' => 'Settings']
        ] as $link)
            <li>
                <a href="{{ route($link['route']) ?? '#' }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-md border border-gray-200 transition hover:bg-gray-100 hover:shadow-sm">
                    <i class="{{ $link['icon'] }} text-acorn"></i>
                    <span class="sidebar-text">{{ $link['label'] }}</span>
                </a>
            </li>
        @endforeach

        <!-- Bookings with Badge -->
        <li>
            <a href="{{ route('admin.bookings.index') ?? '#' }}"
               class="flex items-center justify-between px-3 py-2 rounded-md border border-gray-200 transition hover:bg-gray-100 hover:shadow-sm">
                <span class="flex items-center gap-3">
                    <i class="fas fa-calendar-check text-acorn"></i>
                    <span class="sidebar-text">Bookings</span>
                </span>
                <span class="text-xs font-semibold text-white bg-acorn_green rounded-full px-2 py-0.5">
                    {{ $notificationCount ?? 1 }}
                </span>
            </a>
        </li>

        <!-- Billing Dropdown -->
        <!-- Billing Dropdown -->
        <li>
            <button @click="activeDropdown = activeDropdown === 'billing' ? '' : 'billing'"
                class="flex items-center justify-between w-full px-3 py-2 rounded-md border border-gray-200 transition hover:bg-gray-100 hover:shadow-sm">
                <span class="flex items-center gap-3">
                    <i class="fas fa-file-invoice-dollar text-acorn"></i>
                    <span class="sidebar-text">Billing</span>
                </span>
                <i :class="activeDropdown === 'billing' ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
            </button>

            <ul x-show="activeDropdown === 'billing'" x-transition class="pl-8 mt-2 space-y-1">
                <li>
                    <a href="{{ route('admin.invoices.create') }}"
                    class="block px-3 py-1 text-sm hover:text-indigo-600">
                    <i class="fas fa-plus-circle mr-1 text-gray-400"></i> Create Invoice
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.invoices.index') }}"
                    class="block px-3 py-1 text-sm hover:text-indigo-600">
                    <i class="fas fa-file-invoice mr-1 text-gray-400"></i> Invoices
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.payments.index') }}"
                    class="block px-3 py-1 text-sm hover:text-indigo-600">
                    <i class="fas fa-money-check-alt mr-1 text-gray-400"></i> Payments
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.payments.stk.index') }}"
                    class="block px-3 py-1 text-sm hover:text-indigo-600">
                    <i class="fas fa-mobile-alt mr-1 text-gray-400"></i> STK Payments
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.payments.c2b.index') }}"
                    class="block px-3 py-1 text-sm hover:text-indigo-600">
                    <i class="fas fa-exchange-alt mr-1 text-gray-400"></i> C2B Payments
                    </a>
                </li>
            </ul>
        </li>


        <!-- Legal Dropdown -->
        <li>
            <button @click="activeDropdown = activeDropdown === 'legal' ? '' : 'legal'"
                class="flex items-center justify-between w-full px-3 py-2 rounded-md border border-gray-200 transition hover:bg-gray-100 hover:shadow-sm">
                <span class="flex items-center gap-3">
                    <i class="fas fa-balance-scale text-acorn"></i>
                    <span class="sidebar-text">Legal</span>
                </span>
                <i :class="activeDropdown === 'legal' ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
            </button>

            <ul x-show="activeDropdown === 'legal'" x-transition class="pl-8 mt-2 space-y-1">
                <li><a href="{{ route('admin.legals.edit', 'terms') }}" class="block px-3 py-1 text-sm hover:text-indigo-600">Terms & Conditions</a></li>
                <li><a href="{{ route('admin.legals.edit', 'privacy') }}" class="block px-3 py-1 text-sm hover:text-indigo-600">Privacy Policy</a></li>
                <li><a href="{{ route('admin.legals.edit', 'booking') }}" class="block px-3 py-1 text-sm hover:text-indigo-600">Booking & Return</a></li>
                <li><a href="{{ route('admin.legals.edit', 'copyright') }}" class="block px-3 py-1 text-sm hover:text-indigo-600">Copyright</a></li>
            </ul>
        </li>

        <!-- Logout -->
        <li>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"
                        class="flex items-center gap-3 w-full text-left px-3 py-2 rounded-md border border-red-300 text-red-600 transition hover:bg-red-50 hover:shadow-sm">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="sidebar-text">Logout</span>
                </button>
            </form>
        </li>

    </ul>
</nav>
