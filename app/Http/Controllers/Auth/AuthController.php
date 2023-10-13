<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct(
        public UserService $userService
    ){}

    public function register(): View
    {
        return view('auth.register');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect()->intended('/panel');
        }

        return back()->withErrors([
            'email' => __('Podane dane logowania są nieprawidłowe'),
        ])->onlyInput('email');
    }
    public function store(RegisterRequest $request): RedirectResponse
    {
        $this->userService->store($request->validated());

        return redirect('/')->with('status', __('Konto zostało założone, potwierdź adres email i zaloguj się.'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
