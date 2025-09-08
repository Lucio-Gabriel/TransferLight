<?php

use App\Livewire\Transfer\Create;
use App\Models\User;
use Livewire\Livewire;

it('should be able to can create a transfer', function () {
    $userSender = User::factory()->create([
        'name'    => 'Sender User',
        'email'   => 'sender@example.com',
        'balance' => 1000,
    ]);

    $userReceiver = User::factory()->create([
        'name'    => 'Receiver User',
        'email'   => 'receiver@example.com',
        'balance' => 500,
    ]);

    $this->actingAs($userSender);

    Livewire::test(Create::class)
        ->set('name', 'Receiver User')
        ->set('email', $userReceiver->email)
        ->set('value', '100')
        ->call('submit')
        ->assertRedirect(route('index-user'))
        ->assertHasNoErrors();

    $userSender->refresh();
    $userReceiver->refresh();

    assert($userSender->balance == 900);
    assert($userReceiver->balance == 600);

    $this->assertDatabaseHas('transfers', [
        'user_id' => $userSender->id,
        'name'    => 'Receiver User',
        'email'   => $userReceiver->email,
        'value'   => 100,
    ]);
});

it('should not be able tocannot create a transfer with insufficient balance', function () {
    $userSender = User::factory()->create([
        'name'    => 'Sender User',
        'email'   => 'sender@example.com',
        'balance' => 50,
    ]);

    $userReceiver = User::factory()->create([
        'name'    => 'Receiver User',
        'email'   => 'receiver@example.com',
        'balance' => 500,
    ]);

    $this->actingAs($userSender);

    Livewire::test(Create::class)
        ->set('name', 'Receiver User')
        ->set('email', $userReceiver->email)
        ->set('value', '100')
        ->call('submit')
        ->assertHasErrors(['value' => 'Saldo insuficiente para realizar a transferência.']);
});

it('should be able validate camp name', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(Create::class)
        ->set('name', '')
        ->set('email', 'receiver@example.com')
        ->set('value', '100')
        ->call('submit')
        ->assertHasErrors(['name' => 'O campo nome é obrigatório.']);
});

it('should be able validate camp email', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(Create::class)
        ->set('name', 'Receiver User')
        ->set('email', '')
        ->set('value', '100')
        ->call('submit')
        ->assertHasErrors(['email' => 'O campo e-mail é obrigatório.']);
});

it('should be able validate camp value', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(Create::class)
        ->set('name', 'Receiver User')
        ->set('email', 'receiver@example.com')
        ->set('value', '')
        ->call('submit')
        ->assertHasErrors(['value' => 'O campo valor é obrigatório.']);
});
