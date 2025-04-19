@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="container" id="post-show">
        <h1>{{ $post->title }}</h1>
        <hr class="title-separator">
        <p><i class="bi bi-clock-history"></i> Mis en ligne le {{ $post->created_at->format('d/m/Y') }}</p>

        @if ($post->image)
            <center><img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="post-banner img-fluid">
            </center>
            <hr>
        @endif

        <p>{!! $post->content !!}</p>

        @foreach ($post->tags as $tag)
            <span class="badge bg-primary">{{ $tag->name }}</span>
        @endforeach

        @if (auth()->check())
            @if (!$post->likes()->where('user_id', auth()->id())->exists())
                <form action="{{ route('posts.like', $post->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-love">
                        <i class="bi bi-heart"></i> ({{ $post->likes()->count() }})
                    </button>
                </form>
            @else
                <button class="btn btn-love" disabled>
                    <i class="bi bi-heart-fill"></i> Déjà liké ({{ $post->likes()->count() }})
                </button>
            @endif
        @else
            <p><a href="{{ route('login') }}">Connectez-vous</a> pour liker cet article.</p>
        @endif


        <a href="{{ route('home') }}" class="btn btn-principal">Retour</a>
    </div>

    <script>
        document.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault();
            fetch(this.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                        "content"),
                    "X-Requested-With": "XMLHttpRequest"
                }
            }).then(response => {
                if (response.ok) {
                    return response.text();
                }
            }).then(() => {
                let button = document.querySelector("button");
                let count = parseInt(button.textContent.match(/\d+/)[0]) + 1;
                button.textContent = `👍 J'aime (${count})`;
            });
        });
    </script>
@endsection
