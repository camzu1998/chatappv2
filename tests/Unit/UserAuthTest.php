<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserAuthTest extends TestCase
{
    /**
     * A basic auth login test.
     */
    public function test_login(): void
    {
        $user = User::find(1);
        Auth::login($user);

        $this->assertTrue(auth()->check());
    }

    /**
     * A basic auth logout test.
     */
    public function test_logout(): void
    {
        $user = User::find(1);
        Auth::login($user);
        Auth::logout();
        $this->assertFalse(auth()->check());
    }
}
