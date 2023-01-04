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
            <th class="text-2xl"><div class="bg-green-600 text-white"><a href="{{route('life.check')}}">Zobacz</a></div></th>
            <th></th>
            <th class="text-2xl"><div class="bg-gray-600 text-white"><a href="{{ route('car.check') }}">Zobacz</a></div></th>
            <th></th>
            <th class="text-2xl"><div class="bg-green-600 text-white"><a href="{{ route('property.check') }}">Zobacz</a></div></th>
        </tr>
    </table>

    <hr class="w-auto h-1 mt-10 bg-gray-300 opacity-50" />

    <div class="py-10">
        <div class="max-w-5xl sm:w-20 md:w-auto lg:w-auto mx-auto sm:px-6 lg:px-8">
            <div class="bg-emerald-900 w-5/12 rounded  mx-auto overflow-hidden shadow-amber-700 sm:rounded-lg">
                <div class="p-6 text-2xl text-center text-white">
                        <a href="{{ route('myins.show') }}">Moje ubezpieczenia</a>
                </div>
            </div>
          </div>
      </div>
    </div>
</x-app-layout>
