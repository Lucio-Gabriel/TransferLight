<?php

namespace App\Livewire\User;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    #[Computed]
    public function balances(): Collection
    {
        return auth()->user()->balances()->get();
    }

    #[Computed]
    public function hasBalance(): bool
    {
        return auth()->user()->balances()->exists();
    }

    public function render(): View
    {
        return view('livewire.user.index');
    }
}
