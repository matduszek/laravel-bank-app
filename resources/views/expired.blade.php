<x-guest-layout>
        <x-slot name="logo">
        </x-slot>

     <div class="flex items-center text-4xl mt-36 mx-auto w-3/4 dark:bg-gray-800 text-white text-sm font-bold px-4 py-3" role="alert">
         <svg class="fill-current w-8 h-8 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
         <p>Sesja wygasła</p>
     </div>





    <div class="mt-8 mx-auto block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Zapraszamy ponownie!</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Jako jedyny bank w Polsce w 2022 roku, otrzymaliśmy nagrodę za najlepszą jakość usług bankowych!</p>
    </div>

    <div class="container py-10 px-10 mx-0 min-w-full grid place-items-center">
    <button type="button" class=" text-center justify-center items-center text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"><a href="{{ route('main') }}"> Przejdź do strony głównej</a></button>
    </div>





</x-guest-layout>

