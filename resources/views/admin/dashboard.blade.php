@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1>Bienvenue dans le panel admin</h1>

    <div class="container">
        <div class="row">
            <div class="card col-md-6">
                <h5>État du système</h5>
                <ul>
                    <li>Charge CPU moyenne (1, 5, 15 minutes) : {{ implode(', ', $cpuLoad) }}%</li>
                    <li>Utilisation mémoire : {{ round($memoryUsage / 1024 / 1024, 2) }} MB</li>
                    <li>Espace disque libre : {{ round($diskFree / 1024 / 1024 / 1024, 2) }} GB</li>
                    <li>Espace disque total : {{ round($diskTotal / 1024 / 1024 / 1024, 2) }} GB</li>
                </ul>
            </div>

            <div class="card col-md-6">
                <h5>Dernières activités</h5>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Utilisateur</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>{{ $activity->description }}</td>
                                <td>{{ $activity->causer->name ?? 'Inconnu' }}</td>
                                <td>{{ $activity->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
