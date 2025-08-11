{{-- File: resources/views/layouts/partials/navbar.blade.php --}}
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ Auth::check() && Auth::user()->role === 'admin' ? route('admin.dashboard') : route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">{{ __('Dashboard') }}</x-nav-link>
                            <x-nav-link :href="route('admin.pengaduan.index')" :active="request()->routeIs('admin.pengaduan.*')">{{ __('Kelola Pengaduan') }}</x-nav-link>
                            <x-nav-link :href="route('admin.knowledge-base.index')" :active="request()->routeIs('admin.knowledge-base.*')">{{ __('Basis Pengetahuan') }}</x-nav-link>
                            <x-nav-link :href="route('admin.faq.index')" :active="request()->routeIs('admin.faq.*')">{{ __('Kelola FAQ') }}</x-nav-link>
                            <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">{{ __('Kelola Pengguna') }}</x-nav-link>
                        @else
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __('Dashboard') }}</x-nav-link>
                            <x-nav-link :href="route('knowledge-base.public')" :active="request()->routeIs('knowledge-base.public')">{{ __('Basis Pengetahuan') }}</x-nav-link>
                            <x-nav-link :href="route('faq.public')" :active="request()->routeIs('faq.public')">{{ __('FAQ') }}</x-nav-link>
                        @endif
                    @else
                         {{-- Link untuk tamu jika diperlukan --}}
                    @endauth
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1"><svg class="fill-current h-4 w-4" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">{{ __('Log Out') }}</x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                     <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700">Log in</a>
                     <a href="{{ route('register') }}" class="ms-4 text-sm font-medium text-gray-700">Register</a>
                @endauth
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /><path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            {{-- Link mobile disamakan dengan desktop --}}
            @auth
                 @if (Auth::user()->role === 'admin')
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">{{ __('Dashboard') }}</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.pengaduan.index')" :active="request()->routeIs('admin.pengaduan.*')">{{ __('Kelola Pengaduan') }}</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.knowledge-base.index')" :active="request()->routeIs('admin.knowledge-base.*')">{{ __('Basis Pengetahuan') }}</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.faq.index')" :active="request()->routeIs('admin.faq.*')">{{ __('Kelola FAQ') }}</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">{{ __('Kelola Pengguna') }}</x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __('Dashboard') }}</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('knowledge-base.public')" :active="request()->routeIs('knowledge-base.public')">{{ __('Basis Pengetahuan') }}</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('faq.public')" :active="request()->routeIs('faq.public')">{{ __('FAQ') }}</x-responsive-nav-link>
                @endif
            @endauth
        </div>

        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">{{ __('Profile') }}</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">{{ __('Log Out') }}</x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>