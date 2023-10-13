<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_login(): void
    {
        $user = User::find(1);
        Auth::login($user);

        $this->assertTrue(auth()->check());
    }
}
