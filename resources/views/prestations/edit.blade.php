<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Modifier la prestation
        </h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('prestations.update', $prestation) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nom" class="block font-medium">Nom</label>
                <input type="text" name="nom" id="nom" value="{{ $prestation->nom }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium">Description</label>
                <textarea name="description" id="description" class="w-full border rounded p-2">{{ $prestation->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="prix" class="block font-medium">Prix (€)</label>
                <input type="number" name="prix" id="prix" step="0.01" value="{{ $prestation->prix }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="duree" class="block font-medium">Durée (minutes)</label>
                <input type="number" name="duree" id="duree" value="{{ $prestation->duree }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="statut" class="block font-medium">Statut</label>
                <select name="statut" id="statut" class="w-full border rounded p-2">
                    <option value="en_attente" @selected($prestation->statut === 'en_attente')>En attente</option>
                    <option value="validee" @selected($prestation->statut === 'validee')>Validée</option>
                </select>
            </div>

           
            
            <div class="mb-4">
    <label for="user_id" class="block font-medium">Intervenant assigné</label>
    <select name="user_id" id="user_id" class="w-full border rounded p-2">
        <option value="">-- Aucun --</option>
        @foreach ($intervenants as $user)
            <option value="{{ $user->id }}" @selected($prestation->user_id === $user->id)>
                {{ $user->name }} ({{ $user->fonction }})
            </option>
        @endforeach
    </select>
</div>


            <button type="submit" class="bg-green-600 text-blue px-4 py-2 rounded">Mettre à jour</button>
            <a href="{{ route('prestations.index') }}" class="ml-2 text-blue-600">Retour</a>
        </form>
    </div>
</x-app-layout>
