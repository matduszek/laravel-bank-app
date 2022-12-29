<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>

    </x-slot>

    <table class="mt-8 border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
        <tr>
            <th class="text-4xl"><div class="items-center mx-auto justify-center">
                    <img class="mx-auto w-16 md:w-32 lg:w-48" src="{{URL::asset('logo/life.png')}}"  alt="profile Pic" height="200" width="200">
                </div></th>
            <th></th>
            <th class="text-4xl"><div class="items-center mx-auto justify-center">
                    <img src="{{URL::asset('logo/car.png')}}" class="mx-auto w-16 md:w-32 lg:w-48" alt="profile Pic" height="200" width="200">
                </div></th>
            <th></th>
            <th class="text-4xl"><div class="items-center mx-auto justify-center">
                    <img src="{{URL::asset('logo/town.png')}}" class="mx-auto w-16 md:w-32 lg:w-48" alt="profile Pic" height="200" width="200">
                </div></th>
        </tr>
        <tr>
            <th class="text-2xl">Ubezpieczenie na życie</th>
            <th></th>
            <th class="text-2xl">Ubezpieczenie na auto</th>
            <th></th>
            <th class="text-2xl">Ubezpieczenie na nieruchomość</th>
        </tr>
        <tr>
            <th class="text-2xl"><div class="dark:bg-gray-900 text-white"><a href="{{route('life.check')}}">Zobacz</a></div></th>
            <th></th>
            <th class="text-2xl"><div class="dark:bg-gray-900 text-white"><a href="{{ route('car.check') }}">Zobacz</a></th>
            <th></th>
            <th class="text-2xl"><div class="dark:bg-gray-900 text-white"><a href="{{ route('property.check') }}">Zobacz</a></th>
        </tr>
    </table>

    <div class="py-12">
        <div class="max-w-7xl sm:w-3 md:w-auto lg:w-auto mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-900 w-4/12 rounded  mx-auto overflow-hidden shadow-amber-700 sm:rounded-lg">
                <div class="p-6 text-2xl text-center text-white">
                        <a href="{{ route('myins.show') }}">Moje ubezpieczenia</a>
                </div>
            </div>
        </div>
    </div>

    </div>



</x-app-layout>
