@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <h2>Ajouter un lien de navbar</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.navitems.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="label" class="form-label">Nom du lien</label>
                <input type="text" class="form-control" id="label" name="label" value="{{ old('label') }}" required>
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="order" class="form-label">Ordre d'affichage</label>
                <input type="number" class="form-control" id="order" name="order" value="{{ old('order', 1) }}"
                    required>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="visible" name="visible" checked>
                <label for="visible" class="form-check-label">Visible</label>
            </div>

            <button type="submit" class="btn btn-success">Ajouter</button>
            <a href="{{ route('admin.navitems.index') }}" class="btn btn-secondary">Retour</a>
        </form>
    </div>
@endsection
