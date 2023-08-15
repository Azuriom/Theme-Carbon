@extends('layouts.base')

@section('title', trans('messages.home'))

@section('app')
    <div class="home-background mb-4 p-4" style="background: url('{{ setting('background') ? image_url(setting('background')) : 'https://via.placeholder.com/2000x500' }}') no-repeat center; background-size: cover">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center text-center text-white h-100">
                <div class="col-md-8">
                    @if(config('theme.title'))
                        <h1 class="title-no-bg">{{ config('theme.title') }}</h1>

                        @if(config('theme.subtitle'))
                            <h2>{{ config('theme.subtitle') }}</h2>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @include('elements.session-alerts')

        @if($message)
            <div class="card mb-4">
                <div class="card-body">
                    {{ $message }}
                </div>
            </div>
        @endif

        @if(! $servers->isEmpty())
            <h2 class="text-center">
                {{ trans('messages.servers') }}
            </h2>

            <div class="row gy-3 justify-content-center mb-5">
                @foreach($servers as $server)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <h3 class="card-title">
                                    {{ $server->name }}
                                </h3>

                                @if($server->isOnline())
                                    <div class="progress mb-1">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $server->getPlayersPercents() }}%">
                                        </div>
                                    </div>

                                    <p class="mb-1">
                                        {{ trans_choice('messages.server.total', $server->getOnlinePlayers(), [
                                            'max' => $server->getMaxPlayers(),
                                        ]) }}
                                    </p>
                                @else
                                    <p>
                                        <span class="badge bg-danger text-white">
                                            {{ trans('messages.server.offline') }}
                                        </span>
                                    </p>
                                @endif

                                @if($server->joinUrl())
                                    <a href="{{ $server->joinUrl() }}" class="btn btn-primary">
                                        {{ trans('messages.server.join') }}
                                    </a>
                                @else
                                    <p class="card-text">{{ $server->fullAddress() }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="row">
            <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="card mb-4">
                        @if($post->hasImage())
                            <a href="{{ route('posts.show', $post->slug) }}">
                                <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="card-img-top">

                                <div class="card-body">
                                    <h3 class="card-title">{{ $post->title }}</h3>
                                    <h4 class="card-subtitle mb-3">
                                        {{ format_date($post->published_at) }}
                                    </h4>

                                    <a class="btn btn-primary" href="{{ route('posts.show', $post->slug) }}">
                                        {{ trans('messages.posts.read') }} <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </a>
                        @else
                            <div class="card-body">
                                <h3 class="card-title">{{ $post->title }}</h3>
                                <h4 class="card-subtitle">
                                    {{ format_date($post->published_at) }}
                                </h4>

                                <hr>

                                <p class="card-text">
                                    {{ Str::limit(strip_tags($post->content), 400) }}
                                </p>
                                <a class="btn btn-primary" href="{{ route('posts.show', $post->slug) }}">
                                    {{ trans('messages.posts.read') }} <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="col-md-4">
                @if(config('theme.discord-id'))
                    <iframe src="https://discordapp.com/widget?id={{ config('theme.discord-id') }}&theme=dark" title="Discord" height="500" class="w-100 border-0 shadow mb-3" allowtransparency="true"></iframe>
                @endif

                @if(config('theme.twitter'))
                    <div class="twitter-widget shadow">
                        <a class="twitter-timeline" data-theme="dark" data-height="500" href="{{ config('theme.twitter') }}">Tweets by Azuriom</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://platform.twitter.com/widgets.js" async></script>
@endpush
