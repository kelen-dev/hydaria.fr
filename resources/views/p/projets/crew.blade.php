@extends('p.projets.layout')

@section('title', 'Crew GTA V')

@section('c\'est quoi ?', 'Le crew, c\'est quoi ?')

@section('présentation')
    <h3 class="fade-right">
        Un crew sur le célèbre jeu, GTA V
    </h3>

    <p class="fade-right">
        Le crew est une communauté de joueurs qui se réunissent pour jouer ensemble à GTA V. Le crew
        est composé de joueurs de tous les âges et de tous les niveaux de compétence. Les joueurs
        peuvent se connecter avec d'autres joueurs du monde entier et jouer ensemble. Le crew offre
        également des forums de discussion où les joueurs peuvent discuter et se faire de nouveaux
        amis.
    </p>

    <h3 class="fade-right">
        Un crew accueillant et non discriminatoire
    </h3>

    <p class="fade-right">
        Hydaria est connu pour sa communauté accueillante, amicale. Mais pas que. En effet,
        notre crew permet aussi à toutes personnes, tels qu'elles soient, d'être en sécurité et de se
        sentir bien.
    </p>

    <h3 class="fade-right">
        Un crew accessible
    </h3>

    <p class="fade-right">
        Hydaria est un crew accessible à tous les joueurs, quel que soit leur niveau, leur ancienneté sur le jeu etc. De
        plus, il est 100% ouvert. Il suffit juste de le rejoindre.
    </p>

    <h3 class="fade-right">
        Conclusion
    </h3>

    <p class="fade-right">
        En conclusion, Hydaria est un crew pour tous les joueurs. Un crew accueillant et une accessibilité à tous les
        niveaux de compétence et d'ancienneté. C'est un <b>nouveau</b> crew pour les joueurs de tous
        les âges.
        Rejoignez la communauté dès aujourd'hui et découvrez une nouvelle expérience de jeu passionnante.
    </p>
@endsection

@section('avantages ?', 'Une ascendence accrue')

@section('avantages')
    Le crew est certes nouveau mais est déjà en train de se faire un nom dans le monde de GTA Online.
@endsection

@section('site')
    Le crew n'a pas de site web pour le moment.
@endsection

@section('skills')
    <li>
        <img src="{{ asset('assets/img/projects/Illustrations/gestion_equipe.webp') }}" alt="gestion_equipe" loading="lazy"
            height="200px" width="auto">
        <span>
            Gestion d'équipe
        </span>
    </li>

    <li>
        <img src="{{ asset('assets/img/projects/Illustrations/gestion_conflits_interets.webp') }}"
            alt="gestion_conflits_interets" loading="lazy" height="200px" width="auto">
        <span>
            Gestion de conflits et d'intêrets
        </span>
    </li>

    <li>
        &RightArrow;
        <span>
            Maîtriser le jeu
        </span>
    </li>
@endsection
