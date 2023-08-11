<?php

use App\Components\TextInput;
use App\Livewire\Demo;
use App\Livewire\DemoForm;
use App\Livewire\DemoInfolist;
use App\Livewire\DemoTable;
use Illuminate\Support\Facades\Route;

Route::get('/demo', Demo::class);
Route::get('/form', DemoForm::class);
Route::get('/infolist', DemoInfolist::class);
Route::get('/table', DemoTable::class);
