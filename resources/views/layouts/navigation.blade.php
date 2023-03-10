<nav x-data="{ open: false }" class="bg-gray-200 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('/logo/slogan.png') }}" width="110px">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Panel główny') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('show.accounts')" :active="request()->routeIs('show.accounts')">
                        {{ __('Moje konta') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('show.transactions')" :active="request()->routeIs('show.transactions')">
                        {{ __('Tran. wych.') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('show2.transactions')" :active="request()->routeIs('show2.transactions')">
                        {{ __('Tran. przych.') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('currency.panel')" :active="request()->routeIs('currency.panel')">
                        {{ __('Kantor') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('show.tickets')" :active="request()->routeIs('show.tickets')">
                        {{ __('Bilety') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('credit.panel')" :active="request()->routeIs('credit.panel')">
                        {{ __('Kredyty') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('insurance.panel')" :active="request()->routeIs('insurance.panel')">
                        {{ __('Ubezpieczenia') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('show.card')" :active="request()->routeIs('show.card')">
                        {{ __('Karty') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('show.investments')" :active="request()->routeIs('show.investments')">
                        {{ __('Lokaty') }}
                    </x-nav-link>
                </div>
            </div>

            <script>
                let time = 10 * 60;
                let refreshIntervalId = setInterval(updateCountdown, 1000);

                function updateCountdown() {
                    const minutes = Math.floor(time / 60);
                    let seconds = time % 60;

                    seconds = seconds < 10 ? '0' + seconds : seconds;
                    const contdownEl = document.getElementById("demo");
                    const contdownES = document.getElementById("demo2");
                    contdownEl.innerHTML = `${minutes}:${seconds}`;
                    contdownES.innerHTML = `${minutes}:${seconds}`;

                    time--;

                    if (time < 0) {
                        clearInterval(refreshIntervalId);
                    }
                }
            </script>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex bg-gray-50 items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            Sesja: <div><p class="ml-1" id="demo"></p></div>
                            <div class="ml-12"> {{ Auth::user()->name }} {{ Auth::user()->surname }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Wyloguj') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Panel główny') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }} {{ Auth::user()->surname }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                 <div class="font-medium mt-3 text-sm text-gray-500">Sesja:<p id="demo2"></p></div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('show.accounts')">
                    {{ __('Moje konta') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('show.transactions')">
                    {{ __('Transakcje wychodzące') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('show2.transactions')">
                    {{ __('Transakcje przychodzące') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('currency.panel')">
                    {{ __('Kantor') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('show.tickets')">
                    {{ __('Bilety') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('credit.panel')">
                    {{ __('Kredyt') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('insurance.panel')">
                    {{ __('Ubezpieczenia') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('show.card')">
                    {{ __('Karty') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('show.investments')">
                    {{ __('Lokaty') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Wyloguj') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
