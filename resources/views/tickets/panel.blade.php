<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>

    </x-slot>

    <table class="mt-8 border-collapse table-auto w-full whitespace-no-wrap table-striped relative">
        <tr>
            <th class="text-2xl"><div class="items-center mx-auto justify-center">
                    <img src="{{URL::asset('logo/bus.png')}}" class="mx-auto" alt="profile Pic" height="200" width="200">
                </div></th>
            <th class="text-2xl"><div class="items-center mx-auto justify-center">
                    <img src="{{URL::asset('logo/road.png')}}" class="mx-auto" alt="profile Pic" height="200" width="200">
                </div></th>
        </tr>
        <tr>
            <th class="text-xl">Bliet miejski</th>
            <th class="text-xl">Opłata autostradowa</th>
        </tr>
        <tr>
            <th class="text-2xl"><a href="{{ route('bus.check') }}"><div class="bg-red-800 hover:bg-red-700 text-white">Zobacz</div></a></th>
            <th class="text-2xl"><a href="{{ route('road.check') }}"><div class="bg-orange-500 hover:bg-orange-400 text-white">Zobacz</div></a></th>
        </tr>
        <tr>
            <th>
                <a href="{{ route('show.bustickets') }}">
                    <div class="py-12">
                        <div class="max-w-2xl sm:w-auto md:w-auto lg:w-auto mx-auto sm:px-6 lg:px-8">
                            <div class="bg-emerald-900 hover:bg-emerald-800 w-8/12 text-center mx-auto overflow-hidden shadow-amber-700 sm:rounded-lg">
                                <div class="p-6 text-sm text-white">
                                    Moje bilety komunikacyjne
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </th>
            <th>
                <a href="{{ route('show.roadtickets') }}">
                    <div class="py-12">
                        <div class="max-w-2xl sm:w-auto md:w-auto lg:w-auto mx-auto sm:px-6 lg:px-8">
                            <div class="bg-emerald-900 hover:bg-emerald-800 w-8/12 text-center mx-auto overflow-hidden shadow-amber-700 sm:rounded-lg">
                                <div class="p-6 text-sm text-white">
                                    Moje bilety autostradowe
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </th>
        </tr>
    </table>





    </div>



</x-app-layout>
