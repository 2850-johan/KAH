<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tableau de bord - Intervenant
        </h2>
    </x-slot>

    <div class="p-6 text-gray-900">
        Bienvenue, {{ Auth::user()->name }} <br>
        Fonction : {{ Auth::user()->fonction }}
    </div>
</x-app-layout>
