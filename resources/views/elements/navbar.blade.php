<div class="@if (Route::is('home')) home-background @endif">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="{{ route('home') }}"
                    class="img-fluid d-lg-block d-sm-none navbar-brand-img" loading="lazy">
                Hydaria Corp
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
                aria-controls="offcanvas" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end bg-accent-darker" tabindex="-1" id="offcanvas"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body justify-content-end">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link @if (Route::is('projects.bountyfac', 'projects.crew')) active @endif dropdown-toggle"
                                data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">Projets</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item @if (Route::is('projects.bountyfac')) active @endif"
                                        href="{{ route('projects.bountyfac') }}">BountyFac</a>
                                </li>

                                <hr>

                                <li>
                                    <a class="dropdown-item @if (Route::is('projects.crew')) active @endif"
                                        href="{{ route('projects.crew') }}">Crew</a>
                                </li>
                            </ul>
                        </li>

                        @foreach ($navItems as $item)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url($item->url) }}">{{ $item->label }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    @if (Route::is('home'))
        <div id="scroll-down" class="down">
            <a href="#a-propos">
                <span></span>
                Scroll to about
            </a>
        </div>
    @endif
</div>
