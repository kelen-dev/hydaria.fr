@if ($posts->count() > 0)
    {{-- Posts --}}
    <div class="container">
        <section id="posts">
            {{-- Titre section --}}
            <div class="title">
                <h2 class="h2">
                    @lang('messages.title.posts')
                </h2>

                <h1 class="fade-up-delay">
                    @lang('messages.title.posts')
                </h1>
            </div>
            
            <div class="wrapper">
                @foreach ($posts as $post)
                    <div class="col-4">
                        <div class="card">
                            @if ($post->image)
                                <a href="{{ route('post.show', $post->id) }}">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                    <h3 class="card-title-image">{{ $post->title }}</h3>
                                </a>
                                <p class="card-footer">
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                            @else
                                <a href="{{ route('post.show', $post->id) }}">
                                    <img src="{{ asset('assets/img/news.webp') }}" alt="{{ $post->title }}">
                                    <h3 class="card-title-image">{{ $post->title }}</h3>
                                </a>
                                <p class="card-footer">
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <a href="{{ route('posts.index') }}" class="btn btn-principal">
                <span class="bg-slide"></span>
                Voir tous les articles
            </a>
        </section>
    </div>
@else
@endif
