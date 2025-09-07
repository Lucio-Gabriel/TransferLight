<?php

namespace App\Livewire\Balance;

use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public string $value;

    public function rules(): array
    {
        return [
            'value' => 'required|string|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'value.required' => 'O valor é obrigatório',
            'value.string'   => 'O valor deve ser um número',
            'value.min'      => 'O valor deve ser maior que zero',
        ];
    }

    public function save()
    {
        $this->validate();

        $value = (float) str_replace(['.', ','], ['', '.'], $this->value);

        $user = auth()->user();

        $user->balance = $value;
        $user->save();

        return redirect()->route('index-user');
    }

    public function render(): View
    {
        return view('livewire.balance.create');
    }
}
