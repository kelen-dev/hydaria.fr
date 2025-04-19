<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Récupérer les utilisateurs et passer à la vue
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur ajouté avec succès !');
    }

    // Afficher la page de gestion des utilisateurs
    public function manageRoles()
    {
        $users = User::all(); // Récupérer tous les utilisateurs
        $roles = Role::all(); // Récupérer tous les rôles

        return view('admin.roles.manage', compact('users', 'roles'));
    }

    // Mettre à jour le rôle d'un utilisateur
    public function updateRole(Request $request)
    {
        // Valider la requête
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id', // L'utilisateur doit exister
            'role' => 'required|string|exists:roles,name', // Le rôle doit exister
        ]);

        // Trouver l'utilisateur
        $user = User::find($validated['user_id']);

        // Supprimer tous les rôles actuels de l'utilisateur et attribuer le nouveau rôle
        $user->syncRoles([$validated['role']]);

        return redirect()
            ->back()
            ->with('success', "Le rôle de l'utilisateur {$user->name} a été mis à jour !");
    }


    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès !');
    }
}
