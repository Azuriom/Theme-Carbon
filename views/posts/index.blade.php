@extends('layouts.app')

@section('title', trans('messages.posts.posts'))

@section('content')
    <div class="container content-parent">
        <h1 class="title-block">{{ trans('messages.posts.posts') }}</h1>

        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6">
                    <div class="post-preview card my-2">
                        @if($post->hasImage())
                            <img src="{{ $post->imageUrl() }}" class="post-img img-fluid" height="350" alt="{{ $post->title }}">
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h3>
                            <p class="card-text">{{ Str::limit(strip_tags($post->content), 250, '...') }}</p>
                            <a class="btn btn-primary" href="{{ route('posts.show', $post->slug) }}">{{ trans('messages.posts.read') }}</a>

                            <span>{{ trans('messages.posts.posted', [
                                'date' => format_date($post->published_at),
                                'user' => $post->author->name
                            ]) }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
