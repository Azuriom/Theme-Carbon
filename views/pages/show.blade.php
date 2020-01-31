@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)

@section('content')
    <div class="container content-parent">
        <h1 class="title-block">{{ $page->title }}</h1>

        <div class="content">
            {!! $page->content !!}
        </div>
    </div>
@endsection
