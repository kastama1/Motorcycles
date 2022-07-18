<nav x-data="{ open: false }" class="bg-black border-b">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('index') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-white" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                        Classic-motorcycles
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('motorcycles.index')" :active="request()->routeIs('motorcycles.index')">
                        {{ trans('motorcycle.heading') }}
                    </x-nav-link>
                </div>

                @if (Auth::check())
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                        {{ trans('user.heading') }}
                    </x-nav-link>
                </div>
                @endif

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                        {{ trans('about.heading') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                        {{ trans('contacts.heading') }}
                    </x-nav-link>
                </div>

            </div>

            <div class="flex">
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('lang', 'en')">
                        <img class="p-2" src="{{ asset('/storage/images/flags/united-kingdom.png') }}"
                            alt="Vlajka Anglie">{{
                        trans('lang.en') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('lang', 'cs')">
                        <img class="p-2" src="{{ asset('/storage/images/flags/czech-republic.png') }}"
                            alt="Vlajka České republiky">{{ trans('lang.cs') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-1 pb-1 space-y-1">
            <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                Classic-motorcycles
            </x-responsive-nav-link>
        </div>

        <div class="pt-1 pb-1 space-y-1">
            <x-responsive-nav-link :href="route('motorcycles.index')" :active="request()->routeIs('motorcycles.index')">
                {{ trans('motorcycle.heading') }}
            </x-responsive-nav-link>
        </div>

        @if (Auth::check())
        <div class="pt-1 pb-1 space-y-1">
            <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                {{ trans('user.heading') }}
            </x-responsive-nav-link>
        </div>
        @endif

        <div class="pt-1 pb-1 space-y-1">
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ trans('about.heading') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-1 pb-1 space-y-1">
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                {{ trans('contacts.heading') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-1 pb-1 border-t border-gray-200">
            <div class="mt-1 space-y-1">
                <x-responsive-nav-link href="{{ route('lang', 'en') }}"><img class="pr-2 inline-block"
                        src="{{ asset('/storage/images/flags/united-kingdom.png') }}" alt="Vlajka Anglie">{{
                    trans('lang.en') }}
                </x-responsive-nav-link>
            </div>
            <div class="mt-1 space-y-1">
                <x-responsive-nav-link href="{{ route('lang', 'cs') }}"><img class="pr-2 inline-block"
                        src="{{ asset('/storage/images/flags/czech-republic.png') }}" alt="Vlajka České republiky">{{
                    trans('lang.cs') }}
                </x-responsive-nav-link>
            </div>
            <div class="mt-1 space-y-1">
                <!-- Authentication -->
                @if (Auth::check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ trans('login.button-logout') }}
                    </x-responsive-nav-link>
                </form>
                @else
                <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">{{
                    trans('login.button-login-to-manage') }}
                </x-responsive-nav-link>
                @endif
            </div>
        </div>
    </div>
</nav>