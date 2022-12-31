<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="text-4xl mt-5 mb-5 text-black w-3/4 mx-auto text-center">BIURO STACJONARNE</div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d496.0735579246768!2d15.681878209896784!3d50.86504619996565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470eddc56130832b%3A0xf43a7f25752061e!2sPolitechnika%20Wroc%C5%82awska.%20Filia%20w%20Jeleniej%20G%C3%B3rze!5e0!3m2!1spl!2spl!4v1672486840243!5m2!1spl!2spl" class="w-full" height="800" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</x-app-layout>
