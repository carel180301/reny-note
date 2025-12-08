
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0" style="z-index: 1000;">


    <!-- Primary Navigation Menu -->
    <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('assets/logo_askrindo.png') }}" alt="Logo" class="block h-12 w-auto" style="max-width:200px;" />
                    </a>
                </div>

                <!-- Navigation Links (empty for now) -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    {{-- place for nav links if needed --}}
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @if(request()->routeIs('dashboard'))
                    <!-- Add Button -->
                    <button type="button" class="btn p-0 me-3 text-primary" data-bs-toggle="modal" data-bs-target="#addPiutangModal">
                        <i class="bi bi-plus-lg fs-4"></i>
                    </button>

                    <!-- Search -->
                    {{-- <form class="d-flex me-4">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="Search">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form> --}}

                    <form class="d-flex me-4" onsubmit="return false;">
                        <div class="input-group">
                            <input type="search" id="searchInput" class="form-control" placeholder="Search">
                            {{-- <button class="btn btn-outline-secondary" type="button">
                                <i class="bi bi-search"></i>
                            </button> --}}
                        </div>
                    </form>

                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative dropdown-container" x-data="{ dropdownOpen: false }">

                        <div>
                            @php
                                $name = Auth::user()->name ?? '';
                                $parts = explode(' ', trim($name));
                                $initials = strtoupper(substr($name, 0, 3));
                            @endphp

                            <button @click="dropdownOpen = !dropdownOpen" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none">
                                <div class="rounded-full bg-[#f08523] text-white w-8 h-8 flex items-center justify-center font-semibold">{{ $initials }}</div>
                            </button>
                        </div>

                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" style="z-index: 200;">

                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700">Profile</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Responsive nav links could go here -->
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Profile</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="block w-full text-left px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</nav>

