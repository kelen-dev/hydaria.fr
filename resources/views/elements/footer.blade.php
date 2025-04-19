<div class="container-fluid footer--top">
    <div class="container">
        <div class="wrapper">
            <section class="footer-social col-3">
                <h3>
                    Suivez-nous
                </h3>

                <ul>
                    <li>
                        {{-- X --}}
                        <a href="https://twitter.com/KelenSDev" aria-label="X" target="_blank">
                            <i class="bi bi-twitter-x bi-2X"></i>
                        </a>
                    </li>

                    <li>
                        {{-- Facebook --}}
                        <a href="https://www.facebook.com/KelenSDev" aria-label="Facebook" target="_blank">
                            <i class="bi bi-facebook bi-2X"></i>
                        </a>
                    </li>

                    <li>
                        {{-- Instagram --}}
                        <a href="http://instagram.kelens.fr" aria-label="Instagram" target="_blank">
                            <i class="bi bi-instagram bi-2X"></i>
                        </a>
                    </li>

                    <li>
                        {{-- Discord --}}
                        <a href="https://discord.kelens.fr" aria-label="Discord" target="_blank">
                            <i class="bi bi-discord bi-2X"></i>
                        </a>
                    </li>
                </ul>
            </section>

            <div class="footer-logo col-3">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="logo" loading="lazy" height="200px"
                    width="auto">
            </div>

            <section class="footer-links col-3">
                <h3>
                    Liens utiles
                </h3>

                <ul>
                    <li>
                        {{-- Plan du site --}}
                        <a href="#" aria-label="Plan du site" target="_blank">
                            Plan du site
                        </a>
                    </li>

                    <li>
                        {{-- Connexion --}}
                        @guest
                            <a href="{{ route('login') }}">Se connecter</a>
                        @else
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">Se déconnecter</button>
                            </form>
                        @endguest
                    </li>
                </ul>
            </section>
        </div>
    </div>
</div>

<div class="container-fluid px-0 footer--bottom">
    <div class="container">
        <div class="wrapper">
            <div class="footer-copyright">
                <div class="container">
                    Copyright &copy; 2021&dash;{{ date('Y') }}
                    &mid;
                    1.0.0
                    &middot;
                    <a href="https://kelens.fr/" target="_blank" rel="noopener noreferrer">Édité par KelenS Corp</a>
                </div>
            </div>
            <div class="mt-md-0 mt-3 footer-legal">
                <a href="{{ route('mentions-legales') }}" title="mentions-legales" target="_blank">
                    Mentions légales
                </a>
            </div>
        </div>
    </div>
</div>
