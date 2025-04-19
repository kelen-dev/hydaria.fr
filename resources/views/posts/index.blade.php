@extends('layouts.app')

@section('title', 'Posts')

@section('description', 'Site officiel de ' . getSetting('site_name', 'Mon Site'))

@section('content')
    <section id="p-posts">
        <div class="container">
            {{-- Titre section --}}
            <div class="title">
                <h2 class="h2">
                    @lang('messages.title.allposts')
                </h2>

                <h1 class="fade-up-delay">
                    @lang('messages.title.allposts')
                </h1>
            </div>

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

            <!-- Pagination -->
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection
