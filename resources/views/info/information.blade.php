<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="shadow-lg mx-auto w-1/2 h-1/2 rounded-lg overflow-hidden">
        <div class="py-3 text-center px-5 bg-gray-50">% Użycia języków programowania</div>
        <canvas class="p-10" id="chartPie"></canvas>
    </div>

    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart pie -->
    <script>
        const dataPie = {
            labels: ["PHP", "CSS", "BLADE","OTHER"],
            datasets: [
                {
                    label: "My First Dataset",
                    data: [38.3, 33, 28.2,0.5],
                    backgroundColor: [
                        "rgb(133, 105, 241)",
                        "rgb(164, 101, 241)",
                        "rgb(101, 143, 241)",
                        "rgb(211,211,211)"
                    ],
                    hoverOffset: 4,
                },
            ],
        };

        const configPie = {
            type: "pie",
            data: dataPie,
            options: {},
        };

        var chartBar = new Chart(document.getElementById("chartPie"), configPie);
    </script>


    <div class="shadow-lg rounded-lg overflow-hidden">
        <div class="py-3 text-center px-5 bg-gray-50">Czas spędzony przy projektowaniu rozwiązań</div>
        <canvas class="p-10" id="chartBar"></canvas>
    </div>

    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart bar -->
    <script>
        const labelsBarChart = [
            "Baza danych",
            "Funkcja logowania się użytkownika",
            "Model połączenia z bazą danych",
            "Backend funkcjonalności systemu",
            "Frontend aplikacji webowej",
            "Frontend aplikacji mobilnej",
            "Testy",
        ];
        const dataBarChart = {
            labels: labelsBarChart,
            datasets: [
                {
                    label: "Czas godzin pracy [h]",
                    backgroundColor: "hsl(252, 82.9%, 67.8%)",
                    borderColor: "hsl(252, 82.9%, 67.8%)",
                    data: [4, 2, 1, 50, 10, 7, 8],
                },
            ],
        };

        const configBarChart = {
            type: "bar",
            data: dataBarChart,
            options: {},
        };

        var chartBar = new Chart(
            document.getElementById("chartBar"),
            configBarChart
        );
    </script>

    <div class="flex mt-10 justify-center">
        <div class="block rounded-lg shadow-lg mb-10 bg-gray-50 max-w-sm text-center">
            <div class="py-3 px-6 border-b border-gray-300">
                STACK TECHNOLOGICZNY
            </div>
            <div class="p-6">
                <h5 class="text-gray-900 text-xl font-medium mb-2">Technologie: </h5>
                <p class="text-red-800 text-base mb-4">
                    Laravel 9
                </p>
                <p class="text-violet-700 text-base mb-4">
                    PHP 8.1
                </p>
                <p class="text-blue-700 text-base mb-4">
                    Tailwindcss 3.2.4
                </p>
            </div>
        </div>
    </div>

</x-app-layout>
