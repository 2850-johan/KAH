<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <h1 class="text-4xl font-bold mb-4">Bienvenue sur le planning médical</h1>
        <p class="mb-6">Connectez-vous ou inscrivez-vous pour accéder à votre espace.</p>
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Connexion</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-green-600 text-white rounded">Inscription</a>
        </div>
    </div>
</body>
</html>
