<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // ✅ C’est CE qu’il manquait
use App\Models\Prestation;
use App\Models\User;
use Illuminate\Http\Request;

class PrestationController extends Controller
{
    public function index()
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Accès refusé');
        }

        $prestations = Prestation::latest()->get();
        return view('prestations.index', compact('prestations'));
    }

    public function create()
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403);
        }
        $intervenants = User::role('intervenant')->get();
        return view('prestations.create', compact('intervenants'));


        //return view('prestations.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403);
        }

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'duree' => 'required|integer|min:1',
            'user_id' => 'nullable|exists:users,id',
        ]);

        Prestation::create($validated);
        
        $prestation = Prestation::create($validated);

// S’il y a un intervenant assigné, on lui envoie un mail
    if ($prestation->user_id) {
    $intervenant = User::find($prestation->user_id);
    \Mail::raw("Bonjour {$intervenant->name}, une prestation vous a été assignée : {$prestation->nom}.", function ($message) use ($intervenant) {
        $message->to($intervenant->email)
                ->subject('Nouvelle prestation assignée');
    });
}


        return redirect()->route('prestations.index')->with('success', 'Prestation ajoutée.');
    }

   public function edit(Prestation $prestation)
{
    if (!auth()->user()->hasRole('admin')) {
        abort(403);
    }

    $intervenants = User::role('intervenant')->get();
    return view('prestations.edit', compact('prestation', 'intervenants'));
}

    public function update(Request $request, Prestation $prestation)
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403);
        }

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'duree' => 'required|integer|min:1',
            'statut' => 'required|in:en_attente,validee',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $prestation->update($validated);

        return redirect()->route('prestations.index')->with('success', 'Prestation mise à jour.');
    }

    public function destroy(Prestation $prestation)
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403);
        }

        $prestation->delete();

        return redirect()->route('prestations.index')->with('success', 'Prestation supprimée.');
    }
}
