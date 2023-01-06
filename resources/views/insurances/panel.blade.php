<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>

    </x-slot>

    <table class="mt-8 border-collapse table-auto w-full whitespace-no-wrap table-striped relative">
        <tr>
            <th class="text-4xl"><div>
                    <img class="mx-auto w-12 md:w-32 lg:w-48" src="{{URL::asset('logo/life.png')}}"  alt="profile Pic" height="200" width="200">
                </div></th>
            <th></th>
            <th class="text-4xl"><div>
                    <img src="{{URL::asset('logo/car.png')}}" class="mx-auto w-12 md:w-32 lg:w-48" alt="profile Pic" height="200" width="200">
                </div></th>
            <th></th>
            <th class="text-4xl"><div>
                    <img src="{{URL::asset('logo/town.png')}}" class="mx-auto w-12 md:w-32 lg:w-48" alt="profile Pic" height="200" width="200">
                </div></th>
        </tr>
        <tr>
            <th class="text-xl">Ubezpieczenie na życie</th>
            <th></th>
            <th class="text-xl">Ubezpieczenie na auto</th>
            <th></th>
            <th class="text-xl">Ubezpieczenie na nieruchomość</th>
        </tr>
        <tr>
            <th class="text-2xl"><div class="bg-green-600 hover:bg-green-700 text-white"><a href="{{route('life.check')}}">Zobacz</a></div></th>
            <th></th>
            <th class="text-2xl"><div class="bg-green-600 hover:bg-green-700 text-white"><a href="{{ route('car.check') }}">Zobacz</a></div></th>
            <th></th>
            <th class="text-2xl"><div class="bg-green-600 hover:bg-green-700 text-white"><a href="{{ route('property.check') }}">Zobacz</a></div></th>
        </tr>
    </table>

    <hr class="w-auto h-1 mt-10 bg-gray-300 opacity-50" />

    <a href="{{ route('myins.show') }}">
        <div class="py-1">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-emerald-900 hover:bg-emerald-800 text-white text-center rounded mx-auto mt-4 w-1/3 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white">
                        {{ __("Moje ubezpieczenia") }}
                    </div>
                </div>
            </div>
        </div>
    </a>

    </div>
</x-app-layout>
