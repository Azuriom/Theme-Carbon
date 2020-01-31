@extends('layouts.app')

@section('content')
    <div class="container content-parent">
        <h1 class="title-block">{{ trans('errors.error') }}</h1>

        <div class="content">

            <div class="card-body text-center">
                <h1>@yield('code')</h1>
                <h2>@yield('title')</h2>
                <p>@yield('message')</p>

                <a href="{{ route('home') }}" class="btn btn-primary">{{ trans('errors.home') }}</a>
            </div>
        </div>
    </div>
@endsection
