<?php

namespace App\Livewire;

use App\Components\TextInput;
use Illuminate\Support\Str;
use Livewire\Component;

class TestForm extends Component
{
    public $email;

    public function render()
    {
        $input = TextInput::make('email')
            ->label(function ($random, $foo, $state) {
                return $state;
            })
            ->livewire($this);

        return view('livewire.test-form', [
            'input' => $input,
        ]);
    }
}
