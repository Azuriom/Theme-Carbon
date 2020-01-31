@extends('layouts.app')

@section('title', trans('auth.passwords.reset'))

@section('content')
    <div class="container content-parent">
        <h1 class="title-block">{{ trans('auth.passwords.reset') }}</h1>

        <div class="content">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" id="captcha-form">
                @csrf

                <div class="form-group">
                    <label for="email">{{ trans('auth.email') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                @include('elements.captcha')

                <button type="submit" class="btn btn-primary">
                    {{ trans('auth.passwords.send') }}
                </button>
            </form>
        </div>
    </div>
@endsection
