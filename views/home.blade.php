@extends('layouts.app')

@section('title', trans('messages.home'))

@section('content')
    <div class="home-background mb-4 p-4" style="background: url('{{ setting('background') ? image_url(setting('background')) : 'https://via.placeholder.com/2000x500' }}') no-repeat center; background-size: cover">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center text-center text-white h-100">
                <div class="col-md-8">
                    @if(config('theme.title'))
                        <h1>{{ config('theme.title') }}</h1>
                    @endif
                    @if(config('theme.subtitle'))
                        <h3>{{ config('theme.subtitle') }}</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="post-preview mb-3">
                        @if($post->image !== null)
                            <img src="{{ $post->imageUrl() }}" class="post-img img-fluid" alt="{{ $post->title }}">
                        @endif

                        <div class="post-body">
                            <h3><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h3>
                            @if($post->image === null)
                                <p>{{ Str::limit(strip_tags($post->content), 250, '...') }}
                                    <a href="{{ route('posts.show', $post->slug) }}">{{ trans('messages.posts.read') }}</a>
                                </p>
                            @endif

                            {{ trans('messages.posts.posted', ['date' => format_date($post->published_at), 'user' => $post->author->name]) }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-4">
                @if(config('theme.discord-id'))
                    <iframe src="https://discordapp.com/widget?id={{ config('theme.discord-id') }}&theme=dark" title="Discord" height="500" class="discord-widget shadow mb-3" allowtransparency="true"></iframe>
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

