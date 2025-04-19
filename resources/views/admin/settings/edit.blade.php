@extends('layouts.admin')

@section('title', 'Paramètres')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Paramètres du Site</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="site_name">Nom du site</label>
                <input type="text" name="site_name" id="site_name" class="form-control"
                    value="{{ old('site_name', $setting->site_name) }}" required>
            </div>

            <div class="form-group">
                <label for="site_description">Description du site</label>
                <textarea name="site_description" id="site_description" class="form-control">{{ old('site_description', $setting->site_description) }}</textarea>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="color_primary" class="form-label">Couleur principale</label>
                    <input type="color" class="form-control" id="color_primary" name="color_primary"
                        value="{{ old('color_primary', $setting->color_primary) }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="color_secondary" class="form-label">Couleur secondaire</label>
                    <input type="color" class="form-control" id="color_secondary" name="color_secondary"
                        value="{{ old('color_secondary', $setting->color_secondary) }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
