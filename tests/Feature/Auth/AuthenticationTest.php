<?php

use App\Models\User;
use Livewire\Volt\Volt;

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response
        ->assertOk()
        ->assertSeeVolt('pages.auth.login');
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => 'password',
        'user_type' => 'user',
        'cpf' => '12345678900'
    ]);

    $component = Volt::test('pages.auth.login')
        ->set('form.email', 'test@example.com')
        ->set('form.password', 'password')
        ->set('form.user_type', 'user')
        ->set('form.cpf', '12345678900');

    $component->call('login');

    $component
        ->assertHasNoErrors()
        ->assertRedirect(route('index-user', absolute: false));

    $this->assertAuthenticated();
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => 'password',
        'user_type' => 'user',
        'cpf' => '12345678900'
    ]);

    $component = Volt::test('pages.auth.login')
        ->set('form.email', 'test@example.com')
        ->set('form.password', 'wrong-password')
        ->set('form.user_type', 'user')
        ->set('form.cpf', '12345678900');

    $component->call('login');

    $component
        ->assertHasErrors()
        ->assertNoRedirect();

    $this->assertGuest();
});

test('navigation menu can be rendered', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->get('/index-shopkeeper');

    $response
        ->assertOk()
        ->assertSeeVolt('layout.navigation');
});

test('users can logout', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $component = Volt::test('layout.navigation');

    $component->call('logout');

    $component
        ->assertHasNoErrors()
        ->assertRedirect('/');

    $this->assertGuest();
});
