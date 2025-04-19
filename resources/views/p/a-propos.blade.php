@extends('layouts.app')

@section('title', 'A propos')

@section('content')
    <div class="container content" id="p-propos">
        {{-- Titre section --}}
        <div class="title">
            <h2 class="h2">
                @lang('messages.title.faq')
            </h2>

            <h1>
                @lang('messages.title.faq')
            </h1>
        </div>

        <div class="accordion" id="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#What_that"
                        aria-expanded="true" aria-controls="What_that">
                        <h3>
                            Qu'est-ce donc ?
                        </h3>
                    </button>
                </h2>
                <div id="What_that" class="accordion-collapse collapse show" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        <h5>
                            Une plateforme multigaming.
                        </h5>

                        <p>
                            Notre projet est une plateforme multigaming dédiée à rassembler une communauté de passionnés de
                            jeux vidéo, souhaitant partager des moments conviviaux et immersifs dans des jeux variés. Que
                            vous soyez là pour l’aventure, le défi, ou simplement pour le plaisir du jeu, notre objectif est
                            de créer un espace où chacun peut s’amuser et évoluer ensemble.
                        </p>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#Who_is_it" aria-expanded="false" aria-controls="Who_is_it">
                        <h3>
                            Qui sommes-nous ?
                        </h3>
                    </button>
                </h2>
                <div id="Who_is_it" class="accordion-collapse collapse" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        <h5>
                            De jeunes entrepreneurs
                        </h5>

                        <p>
                            Nous sommes une équipe de passionnés de technologie et de jeux vidéo, réunis par notre amour
                            pour les expériences en ligne collaboratives et compétitives. Notre équipe travaille avec
                            enthousiasme pour offrir un lieu où les gamers de tout horizon peuvent se retrouver et vivre des
                            expériences mémorables.
                        </p>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#purpose" aria-expanded="false" aria-controls="purpose">
                        <h3>
                            Que proposons-nous ?
                        </h3>
                    </button>
                </h2>
                <div id="purpose" class="accordion-collapse collapse" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        <h5>
                            Des serveurs de jeux
                        </h5>

                        <p>
                            Sur notre plateforme, vous trouverez des fonctionnalités multijoueurs, un espace bac à sable
                            pour laisser libre cours à votre créativité, ainsi qu'une communauté dynamique sur divers
                            serveurs Discord.
                        </p>

                        <h5>
                            Également une faction sur le célèbre serveur PvP-Faction, Paladium.
                        </h5>

                        <p>
                            Nous avons également une faction sur le célèbre serveur Minecraft PvP-faction,
                            Paladium, pour tous ceux qui aiment les défis stratégiques et la compétition !
                        </p>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <h3>
                            Sur quelles plateformes nous retrouver ?
                        </h3>
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        <h5>
                            Sur ordinateur mais aussi mobile.
                        </h5>

                        <p>
                            Vous pouvez nous rejoindre sur notre serveur Discord pour discuter, échanger, et participer aux
                            évènements de la communauté. Actuellement disponible sur PC, notre plateforme arrivera bientôt
                            sur mobile, afin que vous puissiez jouer et interagir où que vous soyez.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
