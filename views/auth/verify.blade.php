@extends('layouts.app')

@section('title', trans('auth.verify'))

@section('content')
    <div class="container content-parent">
        <h1 class="title-block">{{ trans('auth.verify') }}</h1>

        <div class="content">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ trans('auth.verify-sent') }}
                </div>
            @endif

            <p>{{ trans('auth.verify-check') }}</p>
            <p>{{ trans('auth.verify-request') }}</p>

            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-primary">{{ trans('auth.verify-resend') }}</button>
            </form>
        </div>
    </div>
@endsection
