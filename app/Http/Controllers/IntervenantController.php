<?php
namespace App\Http\Controllers;

use App\Models\User;

class IntervenantController extends Controller
{
    public function index()
{
    $intervenants = \App\Models\User::role('intervenant')->get();
    return view('intervenants.index', compact('intervenants'));
}public function edit(User $user)
{
    return view('intervenants.edit', compact('user'));
}

public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'fonction' => 'nullable|string|max:255',
    ]);

    $user->update($validated);

    return redirect()->route('intervenants.index')->with('success', 'Intervenant mis à jour.');
}

public function destroy(User $user)
{
    $user->delete();

    return redirect()->route('intervenants.index')->with('success', 'Intervenant supprimé.');
}



}
