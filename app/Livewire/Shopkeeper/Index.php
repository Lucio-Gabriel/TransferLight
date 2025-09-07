<?php

namespace App\Livewire\Shopkeeper;

use App\Models\Transfer;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    #[Computed]
    public function shopkeeperBalance(): User
    {
        return auth()->user();
    }

    #[Computed]
    public function transfersReceived()
    {
        return Transfer::where('email', auth()->user()->email)
            ->latest()
            ->get();
    }

    public function render(): View
    {
        return view('livewire.shopkeeper.index');
    }
}
