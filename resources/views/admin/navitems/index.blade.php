@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Gestion de la Navbar</h2>
            <a href="{{ route('admin.navitems.create') }}" class="btn btn-primary">Ajouter un lien</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Ordre</th>
                    <th>Label</th>
                    <th>URL</th>
                    <th>Visible</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($navItems as $item)
                    <tr>
                        <td>{{ $item->order }}</td>
                        <td>{{ $item->label }}</td>
                        <td>{{ $item->url }}</td>
                        <td>
                            @if ($item->visible)
                                <span class="badge bg-success">Oui</span>
                            @else
                                <span class="badge bg-secondary">Non</span>
                            @endif
                        </td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('admin.navitems.edit', $item) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <form action="{{ route('admin.navitems.destroy', $item) }}" method="POST"
                                onsubmit="return confirm('Supprimer ce lien ?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Aucun lien défini pour la navbar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('admin.navitems.order') }}" class="btn btn-outline-secondary mb-3">Réorganiser la navbar</a>
    </div>
@endsection
