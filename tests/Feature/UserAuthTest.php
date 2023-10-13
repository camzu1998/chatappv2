<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use JsonException;
use Tests\TestCase;

class UserAuthTest extends TestCase
{
    /**
     * A feature login page test.
     */
    public function test_login_page(): void
    {
        $response = $this->get(route('login.form'));

        $response->assertStatus(200)->assertSee('Zaloguj');
    }

    /**
     * A feature login page test.
     * @throws JsonException
     */
    public function test_login_request(): void
    {
        $response = $this->post(route('login'), [
            'email' => 'kamil.langer@chatapp.com',
            'password' => 'paSs420'
        ]);

        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();

        $response = $this->post(route('login'), [
            'email' => 'kamil.langer@chatapp.com',
            'password' => 'paSs420!'
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertAuthenticated();
        $response->assertRedirectToRoute('user.panel');
    }

    /**
     * A feature register page test.
     */
    public function test_register_page(): void
    {
        $response = $this->get(route('register.form'));

        $response->assertStatus(200)->assertSee('Zarejestruj');
    }

    /**
     * A feature register request test.
     * @throws JsonException
     */
    public function test_register_request(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'test test',
            'email' => 'test.test@chatapp.com',
            'password' => 'paSs420',
            'password_confirmation' => 'paSs420!@'
        ]);

        $response->assertSessionHasErrors(['password']);

        $response = $this->post(route('register'), [
            'name' => 'test test',
            'email' => 'kamil.langer@chatapp.com',
            'password' => 'paSs420',
            'password_confirmation' => 'paSs420'
        ]);

        $response->assertSessionHasErrors(['email']);

        $response = $this->post(route('register'), [
            'name' => 'test test',
            'email' => 'test.test@chatapp.com',
            'password' => 'paSs420!',
            'password_confirmation' => 'paSs420!'
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('users', [
            'email' => 'test.test@chatapp.com',
        ]);
        $response->assertRedirectToRoute('login.form');
    }

    /**
     * A feature logout request test.
     */
    public function test_logout_request(): void
    {
        Auth::loginUsingId(1);
        $response = $this->post(route('logout'));
        $response->assertRedirectToRoute('login.form');
        $this->assertGuest();
    }
}
