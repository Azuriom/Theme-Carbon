@extends('layouts.app')

@section('title', trans('auth.login'))

@section('content')
    <div class="container content-parent">
        <h1 class="title-block">{{ trans('auth.login') }}</h1>

        <div class="content">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ trans('auth.email') }}</label>

                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ trans('auth.password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">{{ trans('auth.remember-me') }}</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ trans('auth.login') }}
                </button>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ trans('auth.forgot-password') }}
                </a>
            </form>
        </div>
    </div>
@endsection
