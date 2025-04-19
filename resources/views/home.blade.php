@extends('layouts.app')

@section('title', 'Accueil')

@section('description', 'Site officiel de ' . getSetting('site_name', 'Mon Site'))

@section('content')
    @include('elements.home.posts')

    {{-- Titre section --}}
    <section id="a-propos">
        <div class="container">
            {{-- Titre section --}}
            <div class="title">
                <h2 class="h2">
                    @lang('messages.title.about')
                </h2>

                <h1 class="fade-up-delay">
                    @lang('messages.title.about')
                </h1>
            </div>

            {{-- Questions --}}
            <div class="info">
                <ul class="wrapper">
                    <li class="où-sommes-nous col-4">
                        <h3>
                            Plusieurs types de jeux
                        </h3>

                        <p>
                            Nous sommes sur <b>Minecraft</b> mais aussi sur <b>CS:GO</b> ou bien même sur le fabuleux jeu,
                            riche en
                            contenu, <b>GTA Online</b>.
                        </p>
                    </li>
                    <li class="projet col-4">
                        <h3>
                            Un projet de toute une vie
                        </h3>

                        <p>
                            <b>Minecraft :</b> Nous possédons 13 serveurs en multijoueur actuellement éteints.
                        </p>

                        <p>
                            <b>Paladium :</b> Nous sommes présent sur ce serveur mythique avec une faction
                            se nommant BountyFac.
                        </p>

                        <p>
                            <b>Communauté active :</b> Nos différents projets sont liés à des serveurs Discord dédiés, vous
                            permettant de rejoindre des discussions, de trouver des partenaires de jeu, et de participer à
                            des événements communautaires. Chaque projet a son propre serveur, facilitant l'organisation et
                            les échanges.
                        </p>
                    </li>
                    <li class="partenaires col-4">
                        <h3>
                            Recherche de partenaires
                        </h3>

                        <p>
                            Nous recherchons des partenaires serieux pour l'hébergement des serveurs.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <div class="container">
        <section id="projects">
            <div role="tabpanel">
                {{-- Titre section --}}
                <div class="title">
                    <h2 class="h2">
                        @lang('messages.title.games')
                    </h2>

                    <h1 class="fade-up-delay">
                        @lang('messages.title.games')
                    </h1>
                </div>

                {{-- Catégories --}}
                <div class="list-group fade-delay" id="myList" role="tablist">
                    @include('elements.home.catégories')
                </div>

                <div class="container">
                    {{-- Contenu des catégories --}}
                    <div class="tab-content">
                        @include('elements.home.contenu of categories')
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- Titre section --}}
    <div class="title">
        <h2 class="h2">
            @lang('messages.title.gallery')
        </h2>

        <h1 class="fade-up-delay">
            @lang('messages.title.gallery')
        </h1>
    </div>

    <div class="container">
        {{-- Gallerie Photos --}}
        <section id="gallery">
            @include('elements.home.gallerie photos')
        </section>

        {{-- LightBox --}}
        <div class="lightbox" id="lightbox">
            <span class="close" onclick="closeLightbox()">&times;</span>
            <img class="lightbox-image" id="lightboxImage" src="" alt="Image Agrandie">
        </div>
    </div>
@endsection
