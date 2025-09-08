<?php

use App\Livewire\User\Index;
use App\Models\Transfer;
use App\Models\User;
use Livewire\Livewire;

it('should display list of transfers', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $transfer = Transfer::create([
        'user_id' => $user->id,
        'name'    => 'Receiver User',
        'email'   => 'receiver@example.com',
        'value'   => 100,
    ]);

    Livewire::test(Index::class)
        ->assertSee('Receiver User')
        ->assertSee('receiver@example.com')
        ->assertSee('R$ 100,00');
});
