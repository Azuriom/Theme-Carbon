@extends('layouts.app')

@section('title', trans('auth.passwords.confirm'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ trans('auth.passwords.confirm') }}</div>

                    <div class="card-body">
                        {{ trans('auth.need-confirm') }}

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="form-group">
                                <label for="password">{{ trans('auth.password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('auth.passwords.confirm') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ trans('auth.forgot-password') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
