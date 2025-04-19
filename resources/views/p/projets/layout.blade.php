@extends('layouts.projects')

@section('content')
    <div id="p-bountyfac">
        <section id="summary">
            <article id="qu-est-ce-que-c-est">
                <div class="container">
                    <h2 class="fade-left">
                        @yield('c\'est quoi ?')
                    </h2>

                    <div class="wrapper">
                        {{-- left part --}}

                        <img src="{{ asset('assets/img/projects/Illustrations/interrogation.webp') }}" alt="interrogation"
                            class="img-fluid fade-right-delay col-3" loading="lazy">


                        {{-- right part --}}

                        <div class="text-right-part col-9">
                            @yield('présentation')
                        </div>
                    </div>
                </div>
            </article>

            <article id="avantages">
                <div class="container">
                    <h2 class="fade-left">
                        Quels sont les avantages de rejoindre ?
                    </h2>

                    <div class="wrapper">
                        {{-- Left part --}}

                        <div class="text-left-part col-9">
                            <h3 class="fade-right">
                                @yield('avantages ?')
                            </h3>

                            <p class="fade-right">
                                @yield('avantages')
                            </p>
                        </div>

                        {{-- Right part --}}

                        <img src="{{ asset('assets/img/projects/Illustrations/évolution.webp') }}" alt="évolution"
                            class="img-fluid fade-left-delay col-3" loading="lazy">
                    </div>
                </div>
            </article>

            <article id="un-site">
                <div class="container">
                    <h2 class="fade-left">
                        Avez-vous un site ?
                    </h2>

                    <div class="wrapper">
                        {{-- left part --}}

                        <img src="{{ asset('assets/img/projects/Illustrations/interrogation.webp') }}" alt="interrogation"
                            class="img-fluid fade-right-delay col-3" loading="lazy">


                        {{-- right part --}}

                        <div class="text-right-part col-9">
                            <p class="fade-right">
                                @yield('site')
                            </p>
                        </div>
                    </div>
                </div>
            </article>

            <article class="skills-project">
                <div class="container">
                    <div class="carousel">
                        <ul>
                            @yield('skills')
                        </ul>
                    </div>
                </div>
            </article>
        </section>
    </div>
@endsection
