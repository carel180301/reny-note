<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0" style="z-index: 1000;">

    <!-- Primary Navigation Menu -->
    <div class="w-full px-4 sm:px-6 lg:px-8 pt-5">
        <div class="flex justify-between items-center h-16">

            <!-- LEFT: Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('assets/logo_askrindo.png') }}" alt="Logo"
                         class="block h-12 w-auto" style="max-width:200px;" />
                </a>
            </div>

            <!-- RIGHT Controls -->
            <div class="flex items-center space-x-3">

                @if(request()->routeIs('dashboard'))
                    <!-- ADD BUTTON (always visible) -->
                    <button type="button" class="btn p-0 text-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#addPiutangModal">
                        <i class="bi bi-plus-lg fs-4"></i>
                    </button>

                    <!-- SEARCH (DESKTOP ONLY) -->
                    <form class="d-none d-sm-flex" onsubmit="return false;">
                        <div class="input-group">
                            <input type="search" id="searchInput"
                                   class="form-control"
                                   placeholder="Search">
                        </div>
                    </form>
                @endif

                <!-- PROFILE ICON (DESKTOP ONLY) -->
                <div class="relative hidden sm:block" x-data="{ dropdownOpen: false }">

                    @php
                        $name = Auth::user()->name ?? '';
                        $initials = strtoupper(substr($name, 0, 3));
                    @endphp

                    <button @click="dropdownOpen = !dropdownOpen"
                            class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                        <div class="rounded-full bg-[#f08523] text-white w-8 h-8 flex items-center justify-center font-semibold">
                            {{ $initials }}
                        </div>
                    </button>

                    <!-- Desktop Dropdown -->
                    <div x-show="dropdownOpen"
                         @click.away="dropdownOpen = false"
                         class="absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5"
                         style="z-index: 200;">
                        
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700">
                            Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>

                <!-- HAMBURGER (MOBILE ONLY) -->
                <div class="flex sm:hidden">
                    <button @click="open = !open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 
                                   hover:text-gray-500 hover:bg-gray-100">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': !open }"
                                class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !open, 'inline-flex': open }"
                                class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

            </div>

        </div>
    </div>

    <!-- MOBILE MENU -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">

            <!-- Mobile search -->
            @if(request()->routeIs('dashboard'))
            <div class="px-4 mt-3">
                <input type="search" id="searchInputMobile"
                       class="form-control"
                       placeholder="Search...">
            </div>
            @endif

        </div>

        <!-- MOBILE PROFILE SECTION -->
        <div class="pt-4 pb-1 border-t border-gray-200" x-data="{ mobileProfileOpen: false }">

            <div class="flex items-center justify-between px-4">

                <div class="flex items-center space-x-4">

                    <!-- Mobile profile icon -->
                    <div class="rounded-full bg-[#f08523] text-white w-10 h-10 flex items-center justify-center font-semibold">
                        {{ $initials }}
                    </div>

                    <!-- Username + Email -->
                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                </div>

                <!-- Dropdown Toggle Arrow -->
                <button @click="mobileProfileOpen = !mobileProfileOpen"
                        class="text-gray-600 hover:text-gray-800 focus:outline-none">
                    <svg :class="{ 'rotate-180': mobileProfileOpen }"
                         class="h-5 w-5 transform transition-transform duration-200"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

            </div>

            <!-- MOBILE DROPDOWN ITEMS -->
            <div x-show="mobileProfileOpen"
                 x-transition
                 class="mt-4 space-y-1 px-4">

                <a href="{{ route('profile.edit') }}"
                   class="block px-2 py-2 text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded">
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="block w-full text-left px-2 py-2 text-base font-medium text-gray-600 
                                   hover:text-gray-800 hover:bg-gray-100 rounded">
                        Log Out
                    </button>
                </form>

            </div>
        </div>

    </div>

</nav>
