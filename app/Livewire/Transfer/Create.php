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
    public string $value = '';

    protected array $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        'value' => 'required|numeric|min:0.01',
    ];

    protected array $messages = [
        'email.required' => 'O campo e-mail é obrigatório.',
        'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
        'value.required' => 'O campo valor é obrigatório.',
        'value.numeric' => 'O campo valor deve ser um número.',
        'value.min' => 'O valor mínimo para transferência é R$ 0,01.',
    ];

    public function verifyUserSystem()
    {
        $recipientUser = User::where('email', $this->email)->first();

        if (!$recipientUser){
            $this->addError('email', 'Usuário não encontrado no sistema.');
        }

        return;
    }

    public function verifyBalanceUser()
    {
        $authUserBalance = auth()->user();

        if ($this->value > $authUserBalance->balance) {
            $this->addError('value', 'Saldo insuficiente para realizar a transferência.');
        }

        return;
    }

    public function submit()
    {
        $this->validate();

        Transfer::create([
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'email' => $this->email,
            'value' => $this->value,
        ]);

        // DB::transaction(function () {
        //     $recipientUser = User::where('email', $this->email)->first();

        //     $this->verifyUserSystem();
        //     $this->verifyBalanceUser();

        //     $transfer = Transfer::create([
        //         'user_id' => auth()->user()->id,
        //         'name' => auth()->user()->name,
        //         'email' => auth()->user()->email,
        //         'value' => $this->value,
        //         'recipient_id' => $recipientUser->id,
        //     ]);

        //     $authUserBalance->balance = $authUserBalance->balance - $this->value;
        //     $authUserBalance->save();
        // });

        session()->flash('message', 'Transferência realizada com sucesso!');

        $this->redirect(route('index-user'));
    }

    public function render(): View
    {
        return view('livewire.transfer.create');
    }
}
