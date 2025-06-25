<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Détail de la prestation
        </h2>
    </x-slot>

    <div class="p-6">
        <h3 class="text-xl font-bold">{{ $prestation->nom }}</h3>
        <p><strong>Prix :</strong> {{ $prestation->prix }} €</p>
        <p><strong>Durée :</strong> {{ $prestation->duree }} minutes</p>
        <p><strong>Description :</strong> {{ $prestation->description }}</p>
        <p><strong>Statut :</strong> {{ $prestation->statut }}</p>

        <a href="{{ route('prestations.index') }}" class="text-blue-600 mt-4 inline-block">← Retour</a>
    </div>
</x-app-layout>
