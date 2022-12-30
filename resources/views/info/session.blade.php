<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="text-center text-justify mt-10 mx-auto w-3/6 text-xl text-black ">
        <div class="text-4xl mt-5 mb-5 text-black w-3/4 mx-auto text-center">SESJE</div>
        <img src="{{URL::asset('logo/session.png')}}" class="mx-auto mb-5" alt="profile Pic" height="200" width="200">
        Sesje PHP są mechanizmem, który pozwala przechowywać informacje na serwerze przez określony czas, nawet po zamknięciu przeglądarki przez użytkownika.<br>
        Pozwala to na zapamiętanie informacji i stanów na stronie, nawet po przeniesieniu użytkownika na inną stronę lub po ponownym otwarciu strony przez użytkownika.<br>
        Mechanizm implementowany w banku FMMKPARIBAS ustawia sesje na 10 minut bez aktywności użytkownika na stronie. Po upływie tego czasu strona automatycznie wylogowuje użytkownika. Sesje w FMMKPARIBAS są resetowane przy każdej aktywności użytkownika na stronie. W ten sposób zapewniona jest bezpieczeństwo danych i dostępność konta użytkownika.
        <br><br>
        </div>
  </x-app-layout>
