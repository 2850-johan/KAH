<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Ajouter une prestation
        </h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('prestations.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nom" class="block font-medium">Nom</label>
                <input type="text" name="nom" id="nom" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium">Description</label>
                <textarea name="description" id="description" class="w-full border rounded p-2"></textarea>
            </div>

            <div class="mb-4">
                <label for="prix" class="block font-medium">Prix (€)</label>
                <input type="number" name="prix" id="prix" step="0.01" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="duree" class="block font-medium">Durée (minutes)</label>
                <input type="number" name="duree" id="duree" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
    <label for="user_id" class="block font-medium">Assigner à un intervenant</label>
    <select name="user_id" id="user_id" class="w-full border rounded p-2">
        <option value="">-- Aucun --</option>
        @foreach ($intervenants as $user)
            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->fonction }})</option>
        @endforeach
    </select>
</div>

            <button type="submit" class="bg-green-600  px-4 py-2 rounded hover:bg-green-700">Enregistrer</button>

            <a href="{{ route('prestations.index') }}" class="ml-2 text-blue-600">Retour</a>


        </form>
    </div>
</x-app-layout>
