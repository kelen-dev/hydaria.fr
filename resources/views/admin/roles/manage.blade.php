@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1>Gestion des Rôles</h1>

        {{-- Notifications de succès/erreur --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Formulaire pour sélectionner un utilisateur et modifier son rôle --}}
        <form action="{{ route('admin.roles.update') }}" method="POST">
            @csrf

            {{-- Sélectionner l'utilisateur --}}
            <div class="form-group">
                <label for="user_id">Sélectionnez un utilisateur :</label>
                <select id="user_id" name="user_id" class="form-control">
                    <option value="">-- Choisissez un utilisateur --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            {{-- Afficher le rôle actuel --}}
            <div id="current-role" class="mt-3">
                <p><strong>Rôle actuel :</strong> <span id="role-display">Aucun utilisateur sélectionné</span></p>
            </div>

            {{-- Changer le rôle --}}
            <div class="form-group">
                <label for="role">Attribuez un rôle :</label>
                <select id="role" name="role" class="form-control">
                    <option value="">-- Choisissez un rôle --</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Bouton de soumission --}}
            <button type="submit" class="btn btn-primary mt-3">Mettre à jour le rôle</button>
        </form>
    </div>

    {{-- Script pour afficher le rôle actuel de l'utilisateur sélectionné --}}
    <script>
        const users = @json($users); // Convertir les données PHP en objet JavaScript

        document.getElementById('user_id').addEventListener('change', function() {
            const selectedUserId = this.value;
            const user = users.find(user => user.id == selectedUserId);

            // Mettre à jour l'affichage du rôle actuel
            const roleDisplay = document.getElementById('role-display');
            if (user && user.roles && user.roles.length > 0) {
                roleDisplay.innerText = user.roles.map(role => role.name).join(', ');
            } else {
                roleDisplay.innerText = 'Aucun rôle attribué';
            }
        });
    </script>
@endsection
