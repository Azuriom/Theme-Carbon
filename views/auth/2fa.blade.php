@extends('layouts.app')

@section('title', '2fa')

@section('content')
    <div class="container content-parent">
        <h1>2FA</h1>

        <div class="content">
            <form method="POST" action="{{ route('login.2fa') }}">
                @csrf

                <div class="form-group">
                    <label for="code">2fa verification code</label>

                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" required>

                    @error('code')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
