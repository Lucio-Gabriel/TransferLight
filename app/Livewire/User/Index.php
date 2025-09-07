<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    #[Computed]
    public function userBalance(): User
    {
        return auth()->user();
    }

    public function currentBalance(): float
    {
        return auth()->user()->balance;
    }

    #[Computed]
    public function transfers(): Collection
    {
        return auth()->user()->transfers()->get();
    }

    public function render(): View
    {
        return view('livewire.user.index');
    }
}
