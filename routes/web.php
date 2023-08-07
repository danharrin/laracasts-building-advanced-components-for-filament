<?php

use App\Components\TextInput;
use App\Livewire\TestForm;
use Illuminate\Support\Facades\Route;

Route::get('/demo', TestForm::class);
