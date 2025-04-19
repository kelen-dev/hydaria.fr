@extends('layouts.errors')

@section('content')
    <h1>
        @yield('code')
    </h1>

    <div class="container wrapper" id="error">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h2>
                        On dirait qu'il y a une erreur
                    </h2>

                    <p>
                        @yield('title')
                    </p>

                    <p>
                        @yield('message')
                    </p>
                </div>

                <div class="card-footer">
                    <a href="{{ route('home') }}" class="btn btn-principal">
                        <span class="bg-slide"></span>
                        Revenir sur la page d'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
