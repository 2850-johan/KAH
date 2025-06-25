<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Liste des prestations
        </h2>
    </x-slot>




    <div class="p-6">
        
        <a href="{{ route('prestations.create') }}" class="bg-blue-600  px-4 py-2 rounded hover:bg-blue-700">Ajouter une prestation</a> 


        <table class="w-full mt-4 table-auto border-collapse">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Nom</th>
                    <th class="border px-4 py-2">Prix</th>
                    <th class="border px-4 py-2">Durée</th>
                    <th class="border px-4 py-2">Statut</th>
                    <th class="border px-4 py-2">Actions</th>
                    <th class="border px-4 py-2"> Intervenant</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestations as $prestation)
                    <tr>
                        <td class="border px-4 py-2">{{ $prestation->nom }}</td>
                        <td class="border px-4 py-2">{{ $prestation->prix }} €</td>
                        <td class="border px-4 py-2">{{ $prestation->duree }} min</td>
                        <td class="border px-4 py-2">{{ $prestation->statut }}</td>
                        <td class="border px-4 py-2">
                            {{ optional($prestation->intervenant)->name ?? 'Non assigné' }}
                            
                        </td>
                    </tr>
                    <a href="{{ route('prestations.edit', $prestation) }}" class="text-blue-600">Modifier | </a>
                            <form action="{{ route('prestations.destroy', $prestation) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-600 ml-2">Supprimer</button>
                            </form>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>


