<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        // Vérifier si une image est bien envoyée
        if (!$request->hasFile('image')) {
            return response()->json(['error' => 'Aucune image envoyée'], 400);
        }

        $file = $request->file('image');

        // Vérifier si le fichier est valide
        if (!$file->isValid()) {
            return response()->json(['error' => 'Fichier invalide'], 400);
        }

        // Sauvegarder l'image dans storage/public/posts
        $path = $file->store('posts', 'public');

        // Récupérer l'URL pour l'affichage
        $url = Storage::url($path);

        return response()->json(['location' => $url]);
    }
}

