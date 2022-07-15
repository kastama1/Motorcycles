<footer class="p-4 bg-black shadow md:flex md:items-center md:justify-between md:p-6">
    <span class="text-sm text-white sm:text-center">© 2022 <x-nav-link href="{{ route('index') }}"
            :active="request()->routeIs('index')">Classic-motorcycles</x-nav-link> -
        @if (Auth::check())
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Odhlásit se') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            {{ csrf_field() }}
        </form>
        @else
        <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">Přihlásit se pro správu
        </x-nav-link>
        @endif
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm sm:mt-0">
        <li>
            <x-nav-link href="{{ route('motorcycles.index') }}" :active="request()->routeIs('motorcycles.index')"
                class="mr-4 md:mr-6">{{
                trans('motorcycle.heading') }}</x-link>
        </li>
        @if (Auth::check())
        <li>
            <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')"
                class="mr-4 md:mr-6">Uživatelé</x-link>
        </li>
        @endif
        <li>
            <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')" class="mr-4 md:mr-6">{{
                trans('about.heading') }}</x-link>
        </li>
        <li>
            <x-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')" class="mr-4 md:mr-6">{{
                trans('contacts.heading') }}</x-link>
        </li>
    </ul>
</footer>