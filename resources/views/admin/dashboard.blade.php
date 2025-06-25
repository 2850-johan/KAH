<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Tableau de bord Admin
        </h2>
    </x-slot>

   





    <div class="p-6">
    <p class="text-lg font-semibold mb-2">
        Bienvenue {{ Auth::user()->name }} ({{ Auth::user()->fonction ?? '---' }})
    </p>

    <p class="mb-4 text-gray-700">Vous avez accès aux modules suivants :</p>

    <ul class="list-disc list-inside space-y-2 text-blue-700">
        <li>
            <a href="{{ route('prestations.index') }}" class="hover:underline">  → Gérer les prestations</a>
        </li>
        <li>
            <a href="{{ route('intervenants.index') }}" class="hover:underline">  → Gérer les intervenants</a>
        </li>
        
    </ul>
</div>
    
</x-app-layout>
