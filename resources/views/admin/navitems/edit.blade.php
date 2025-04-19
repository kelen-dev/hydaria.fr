@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <h2>Modifier le lien : {{ $navitem->label }}</h2>

        <form action="{{ route('admin.navitems.update', $navitem) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="label" class="form-label">Nom du lien</label>
                <input type="text" class="form-control" id="label" name="label"
                    value="{{ old('label', $navitem->label) }}" required>
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="text" class="form-control" id="url" name="url"
                    value="{{ old('url', $navitem->url) }}" required>
            </div>

            <div class="mb-3">
                <label for="order" class="form-label">Ordre d'affichage</label>
                <input type="number" class="form-control" id="order" name="order"
                    value="{{ old('order', $navitem->order) }}" required>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="visible" name="visible"
                    {{ $navitem->visible ? 'checked' : '' }}>
                <label for="visible" class="form-check-label">Visible</label>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('admin.navitems.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
