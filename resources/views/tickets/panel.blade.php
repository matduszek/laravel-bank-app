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
            <th class="text-2xl"><div class="bg-red-800 text-white"><a href="{{ route('bus.check') }}">Zobacz</a></div></th>
            <th class="text-2xl"><div class="bg-orange-500 text-white"><a href="{{ route('road.check') }}">Zobacz</a></th>
        </tr>
        <tr>
            <th>
                <div class="py-5">
                    <div class="max-w-2xl sm:w-auto md:w-auto lg:w-auto mx-auto sm:px-6 lg:px-8">
                        <div class="bg-emerald-900 w-8/12 text-center mx-auto overflow-hidden shadow-amber-700 sm:rounded-lg">
                            <div class="p-6 text-sm text-white">
                                <a href="{{ route('show.bustickets') }}">Moje bilety komunikacyjne</a>
                            </div>
                        </div>
                    </div>
                </div>
            </th>
            <th>
                <div class="py-5">
                        <div class="max-w-2xl sm:w-auto md:w-auto lg:w-auto mx-auto sm:px-6 lg:px-8">
                            <div class="bg-emerald-900 w-8/12 text-center mx-auto overflow-hidden shadow-amber-700 sm:rounded-lg">
                                <div class="p-6 text-sm text-white">
                                    <a href="{{ route('show.roadtickets') }}">Moje bilety autostradowe</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </th>
        </tr>
    </table>





    </div>



</x-app-layout>
