@extends('layouts.guestLayout')

@section('title', 'Strona logowania')

@section('content')
    <div class="row my-auto">
        <div class="card my-auto">
            <div class="card-header">{{ __('Logowanie') }}</div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Adres Email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">{{ __('Hasło') }}</label>
                        <input type="password" class="form-control" name="password" id="pass">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me">
                        <label class="form-check-label" for="remember_me">{{ __('Zapamiętaj mnie') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Zaloguj') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
