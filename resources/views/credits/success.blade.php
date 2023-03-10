<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">

        </x-slot>

        <div class="items-center mx-auto justify-center">
            <img src="{{URL::asset('/148767.png')}}" class="mx-auto" alt="profile Pic" height="200" width="200">
        </div>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-emerald-600 overflow-hidden shadow-amber-700 sm:rounded-lg">
                    <div class="p-6 text-4xl text-center text-white">
                        {{ __("Kredyt przyznany!") }}
                    </div>
                </div>
            </div>
        </div>

        <div class="block text-center text-white dark:bg-gray-900 w-2/5 rounded text-2xl mx-auto mt-2">
            <a href="{{ route('dashboard') }}">Przejdź dalej</a>
        </div>
    </x-auth-card>
</x-guest-layout>
