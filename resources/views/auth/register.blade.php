@extends('layouts.guestLayout')

@section('title', 'Strona rejestracji')

@section('content')
    <div class="row my-auto">
        <div class="card my-auto">
            <div class="card-header">{{ __('Rejestracja') }}</div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Nazwa') }}</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Adres Email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">{{ __('Hasło') }}</label>
                        <input type="password" class="form-control" name="password" id="pass">
                    </div>
                    <div class="mb-3">
                        <label for="pass2" class="form-label">{{ __('Powtórz Hasło') }}</label>
                        <input type="password" class="form-control" name="password_confirmation" id="pass2">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Zarejestruj się') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
