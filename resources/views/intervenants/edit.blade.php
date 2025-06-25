<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Modifier l'intervenant : {{ $user->name }}
        </h2>
    </x-slot>

    <div class="p-6 max-w-xl mx-auto">
        <form method="POST" action="{{ route('intervenants.update', $user) }}">
            @csrf
            @method('PUT')

            <!-- Nom -->
            <div class="mb-4">
                <label for="name" class="block font-medium text-sm text-gray-700">Nom</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Fonction -->
            <div class="mb-4">
                <label for="fonction" class="block font-medium text-sm text-gray-700">Fonction</label>
                <input type="text" name="fonction" id="fonction" value="{{ old('fonction', $user->fonction) }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                @error('fonction')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Boutons -->
            <div class="flex items-center justify-between">
                <a href="{{ route('intervenants.index') }}" class="text-sm text-gray-600 hover:underline">
                    ← Retour à la liste
                </a>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
