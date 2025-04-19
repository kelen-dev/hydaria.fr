<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create', ['post' => new Post()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'tags' => 'nullable|string', // Assure-toi que les tags sont envoyés sous forme de chaîne
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('posts', 'public') : null;

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        // Synchronisation des tags
        $tags = explode(',', $request->tags);
        $tagIds = [];

        foreach ($tags as $tagName) {
            $tagName = trim($tagName);
            if (!empty($tagName)) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
        }

        $post->tags()->sync($tagIds);

        // Envoi d'une notification à l'utilisateur
        return redirect()->route('admin.posts.index')->with('success', 'Article ajouté avec succès.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($post->image);
            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $post->image,
        ]);

        // Enregistrer l'activité
        activity()
            ->causedBy(Auth::user()) // Enregistre quel utilisateur a fait l'action
            ->performedOn($post) // Sur quelle entité (Post dans ce cas)
            ->withProperties(['title' => $post->title]) // Données supplémentaires
            ->log('Mise à jour d\'un article');

        // Synchronisation des tags
        $tags = explode(',', $request->tags);
        $tagIds = [];

        foreach ($tags as $tagName) {
            $tagName = trim($tagName);
            if (!empty($tagName)) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
        }

        $post->tags()->sync($tagIds);

        return redirect()->route('admin.posts.index')->with('success', 'Article mis à jour.');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Article supprimé.');
    }

    public function like(Post $post)
    {
        $user = Auth::user();

        // Vérifie si l'utilisateur a déjà liké ce post
        if ($post->likes()->where('user_id', $user->id)->exists()) {
            return back()->with('error', 'Vous avez déjà liké ce post.');
        }

        // Ajoute le like
        $post->likes()->attach($user->id);

        return back()->with('success', 'Post liké avec succès !');
    }
}
