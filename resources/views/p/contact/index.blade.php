@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div id="p-contact">
        {{-- Titre --}}
        <div class="title">
            <h2 class="h2">
                @lang('messages.title.contact')
            </h2>

            <h1>
                @lang('messages.title.contact')
            </h1>
        </div>

        {{-- Contenu de la page --}}
        <div class="container wrapper">
            {{-- left part --}}
            <section id="contact-form" class="col-9">
                <p>
                    si vous rencontrez des problèmes avec ce service,
                    <a href="mailto:{{ config('kelens.admin_support_email') }}">
                        veuillez demander de l'aide.
                    </a>
                </p>
                <div class="card mb-5">
                    <form method="POST" action="{{ route('contact.index') }}">
                        @csrf
                        <div class="user-box {{ $errors->has('name') ? 'has-error' : '' }}">
                            <input type="text" name="name" id="name" class="form-control" required="required"
                                value="{{ old('name') }}">
                            {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                            <label for="name">
                                Nom
                            </label>
                        </div>

                        <div class="user-box {{ $errors->has('email') ? 'has-error' : '' }}">
                            <input type="email" name="email" id="email" class="form-control" required="required"
                                value="{{ old('email') }}">
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                            <label for="email">
                                Adresse mail
                            </label>
                        </div>

                        <div class="user-box {{ $errors->has('message') ? 'has-error' : '' }}">
                            <textarea type="message" name="message" id="message" class="form-control" required="required">
                                        {{ old('message') }}
                                    </textarea>
                            {!! $errors->first('message', '<span class="help-block">:message</span>') !!}
                            <label for="text">
                                Message
                            </label>
                        </div>

                        <button class="btn btn-principal" type="submit">
                            Envoyer
                        </button>
                    </form>
                </div>
            </section>

            {{-- right part --}}
            <aside id="contact-infos" class="col-3">
                <div class="banner">
                    <div class="banner-icon">
                        <i class="bi bi-info-lg bi-2X"></i>
                    </div>
                    <div class="banner-title">
                        <h3>
                            INFORMATIONS
                        </h3>
                    </div>
                </div>
                <div id="discord_widget" class="card">
                    <div class="card-header">
                        <h5>
                            <i class="bi bi-discord bi-2X"></i>
                            Notre serveur Discord
                        </h5>
                    </div>

                    <div class="hydaria-widget hydaria-block" data-widget="hydaria_discord_widget">
                        <div class="hydaria-content">
                            <p class="hydaria-Discordusers"></p>
                            <div class="hydaria-Discordinfo">
                                <span class="hydaria-js--Discordcount"></span>
                                <a href="https://discord.hydaria.fr" target="_blank" class="btn btn-principal">
                                    Rejoindre
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
