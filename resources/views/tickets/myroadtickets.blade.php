<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-emerald-900 text-white text-center rounded mx-auto mt-4 w-1/3 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    {{ __("Twoje bilety autostradowe") }}
                </div>
            </div>
        </div>
    </div>

    @foreach($tick as $t)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-blue-500 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <div class="text-center text-2xl">Rejestracja: {{ $t->rej }}</div>
                                <div class="text-center text-2xl">Autostrada: {{ $t->full_road }}</div>
                                <div class="text-right text-xl"><label>Długośc trasy: {{ $t->long }} KM</label></div>
                                <div class="text-right text-xl"><label>Kwota: {{ $t->amount }} PLN</label></div>
                                <div class="text-right text-xl"><label>Data: {{ $t->created_at }} PLN</label></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach

    <div class="mx-auto text-center justify-center justify-items-center items-center">
        {{ $tick->links() }}
    </div>
    </div>
</x-app-layout>



