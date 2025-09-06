<?php

namespace App\Livewire\Transfer;

use App\Models\Transfer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public string $name = '';
    public string $email =  '';
    public string $value;

    protected array $rules = [
        'name' => 'required|string|max:255|min:3',
        'email' => 'required|email|exists:users,email',
        'value' => 'required|numeric|min:0.01',
    ];

    protected array $messages = [
        'name.required' => 'O campo nome é obrigatório.',
        'name.string' => 'O campo nome deve ser uma string.',
        'name.max' => 'O campo nome deve ter no máximo 255 caracteres.',
        'name.min' => 'O campo nome deve ter no mínimo 3 caracteres.',

        'email.required' => 'O campo e-mail é obrigatório.',
        'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
        'email.exists' => 'O e-mail informado não está cadastrado no sistema.',

        'value.required' => 'O campo valor é obrigatório.',
        'value.numeric' => 'O campo valor deve ser um número.',
        'value.min' => 'O valor mínimo para transferência é R$ 0,01.',
    ];

    public function submit()
    {
        $this->validate();

        $value = (float) str_replace(['.', ','], ['', '.'], $this->value);

        Transfer::create([
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'email' => $this->email,
            'value' => $value,
        ]);

        session()->flash('message', 'Transferência realizada com sucesso!');

        $this->redirect(route('index-user'));
    }

    public function render(): View
    {
        return view('livewire.transfer.create');
    }
}
