<?php

use App\Components\TextInput;
use App\Livewire\Demo;
use App\Livewire\DemoForm;
use Illuminate\Support\Facades\Route;

Route::get('/demo', Demo::class);
Route::get('/form', DemoForm::class);
