<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tableau de bord - Admin
        </h2>
    </x-slot>

    <div class="p-6 text-gray-900">
        Bienvenue, {{ Auth::user()->name }} (Admin)
    </div>
</x-app-layout>
