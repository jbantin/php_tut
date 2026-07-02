<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('redirects guests to login', function () {
    $response = $this->get(route('home'))
        ->assertRedirect(route('login'));
});

it('logs in the user if credentials are valid', function () {
    $user = User::factory()->create([
        'password' => ($password = 'password'),
    ]);

    $response = $this->post(route('login.store'), [
        'email' => $user->email,
        'password' => $password,
    ]);

    $response->assertRedirect(route('home'));
    $this->assertAuthenticatedAs($user);
});

it('should not log in the user with wrong credentials and redirect back to login with errors', function () {
    $user = User::factory()->create();

    $response = $this->from(route('login'))->post(route('login.store'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $response->assertRedirect(route('login'));
    $response->assertSessionHasErrors('email');
    $this->assertGuest();
});

it('logout works and redirects to login', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->post(route('logout'));

    $response->assertRedirect(route('login'));
    $this->assertGuest();
});
