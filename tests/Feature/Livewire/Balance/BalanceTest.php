<?php

use App\Livewire\Balance\Create;
use App\Models\User;
use Livewire\Livewire;

it('should be able to create a balance', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(Create::class)
        ->set('value', '1.500,00')
        ->call('save')
        ->assertRedirect(route('index-user'))
        ->assertHasNoErrors();
});

it('should not be able to create a balance with empty value', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(Create::class)
        ->set('value', '')
        ->call('save')
        ->assertHasErrors(['value' => 'required']);
});

