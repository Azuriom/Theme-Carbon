@extends('layouts.app')

@section('title', trans('messages.maintenance'))

@section('content')
    <div class="container content-parent">
        <h1 class="title-block">{{ trans('messages.maintenance') }}</h1>

        <div class="content">
            <h1>{!! setting('maintenance-message', 'The website is under maintenance') !!}</h1>
        </div>
    </div>
@endsection
