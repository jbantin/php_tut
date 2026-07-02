<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('returns only the matching user list partial for an ajax request', function () {
    $alice = User::factory()->create(['name' => 'Alice Anderson']);
    $bob = User::factory()->create(['name' => 'Bob Brown']);

    $response = $this->get('/?search=alice', ['X-Requested-With' => 'XMLHttpRequest']);

    $response->assertSuccessful()
        ->assertViewIs('users._list')
        ->assertSee($alice->name)
        ->assertDontSee($bob->name);
});

it('returns the full page on a normal request', function () {
    User::factory()->create(['name' => 'Alice Anderson']);

    $response = $this->get('/?search=alice');

    $response->assertSuccessful()
        ->assertViewIs('welcome')
        ->assertSee('Search users...');
});

it('returns all users when the ajax search is empty', function () {
    User::factory()->create(['name' => 'Alice Anderson']);
    User::factory()->create(['name' => 'Bob Brown']);

    $response = $this->get('/', ['X-Requested-With' => 'XMLHttpRequest']);

    $response->assertSuccessful()
        ->assertSee('Alice Anderson')
        ->assertSee('Bob Brown');
});
