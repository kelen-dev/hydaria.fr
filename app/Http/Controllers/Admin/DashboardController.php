<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupère les métriques système
        $cpuLoad = function_exists('sys_getloadavg') ? sys_getloadavg() : [0, 0, 0]; // Si indisponible, valeurs par défaut
        $memoryUsage = memory_get_usage(true); // Utilisation mémoire
        $diskFree = disk_free_space('/'); // Espace disque libre
        $diskTotal = disk_total_space('/'); // Espace disque total

        $activities = Activity::latest()->take(10)->get(); // Récupère les 10 dernières activités

        // Passe les données à la vue
        return view('admin.dashboard', compact('cpuLoad', 'memoryUsage', 'diskFree', 'diskTotal', 'activities'));
    }
}
