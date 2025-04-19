@extends('layouts.app')

@section('content')
    <section id="posts-by-tag">
        <div class="container">
            {{-- Titre section --}}
            <div class="title">
                <h2 class="h2">
                    @lang('messages.title.by-tag') : {{ $tag->name }}
                </h2>

                <h1 class="fade-up-delay">
                    @lang('messages.title.by-tag') : {{ $tag->name }}
                </h1>
            </div>

            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
                            <p>{!! Str::limit($post->content, 150) !!}</p>

                            @foreach ($post->tags as $tag)
                                <a href="{{ route('tags.show', $tag) }}" class="badge bg-secondary text-decoration-none me-1">
                                    {{ $tag->name }}
                                </a>
                            @endforeach

                        </div>
                        <div class="card-footer">
                            <p>Mis en ligne le {{ $post->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                @endforeach

                {{ $posts->links() }}
            @else
                <p>Aucun article trouvé pour ce tag.</p>
            @endif
        </div>
    </section>
@endsection
