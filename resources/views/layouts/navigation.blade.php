<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex items-center">

                <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                    <x-application-logo class="h-9 w-auto text-gray-800" />
                    <span class="font-semibold text-gray-700 text-lg hidden sm:block">
                        Inventory
                    </span>
                </a>

                <div class="hidden sm:flex sm:ml-10 sm:space-x-6">

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="px-3 py-2 rounded-md text-sm font-medium">
                        Dashboard
                    </x-nav-link>

                    <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')"
                        class="px-3 py-2 rounded-md text-sm font-medium">
                        Kategori
                    </x-nav-link>

                    <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')"
                        class="px-3 py-2 rounded-md text-sm font-medium">
                        Produk
                    </x-nav-link>

                    <x-nav-link :href="url('/stock')" :active="request()->is('stock')"
                        class="px-3 py-2 rounded-md text-sm font-medium">
                        Stok
                    </x-nav-link>

                </div>

            </div>

            <div class="hidden sm:flex sm:items-center sm:space-x-4">

                <div class="text-sm text-gray-600">
                    {{ Auth::user()->name }}
                </div>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center px-3 py-2 rounded-md text-sm text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                            Menu
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link href="#"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>

            </div>

            <div class="sm:hidden flex items-center">
                <button @click="open = !open" class="p-2 rounded-md text-gray-600 hover:bg-gray-100">
                    ☰
                </button>
            </div>

        </div>
    </div>

    <div :class="open ? 'block' : 'hidden'" class="sm:hidden border-t border-gray-200 bg-white">

        <div class="px-4 pt-2 pb-3 space-y-1">

            <x-responsive-nav-link :href="route('dashboard')">
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('categories.index')">
                Kategori
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('products.index')">
                Produk
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="url('/stock')">
                Stok
            </x-responsive-nav-link>

        </div>

    </div>
</nav>