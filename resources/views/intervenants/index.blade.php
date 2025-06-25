<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Liste des intervenants
        </h2>
    </x-slot>

    <div class="p-6">
        <table class="w-full table-auto border-collapse shadow-sm rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="border px-4 py-2">Nom</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Fonction</th>
                    <th class="border px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($intervenants as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">
                            @if($user->fonction)
                                <span class="inline-block px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded-full">
                                    {{ $user->fonction }}
                                </span>
                            @else
                                <span class="text-gray-400 italic">Non défini</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2 text-center space-x-2">
                            <a href="{{ route('intervenants.edit', $user) }}"
                               class="inline-flex items-center px-3 py-1 bg-yellow-400 text-blue text-xs rounded hover:bg-yellow-500 transition">
                                ✏️ Modifier
                            </a>

                            <form action="{{ route('intervenants.destroy', $user) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Supprimer cet intervenant ?')"
                                        class="inline-flex items-center px-3 py-1 bg-red-500 text-blue text-xs rounded hover:bg-red-600 transition">
                                    🗑️ Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500 italic">
                            Aucun intervenant trouvé.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
