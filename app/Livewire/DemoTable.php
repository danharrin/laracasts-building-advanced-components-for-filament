<?php

namespace App\Livewire;

use App\Models\User;
use DanHarrin\FilamentToolkit\Tables\Columns\ColorColumn;
use DanHarrin\FilamentToolkit\Tables\Filters\DateRangeFilter;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class DemoTable extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query())
            ->columns([
                Tables\Columns\TextInputColumn::make('name'),
                ColorColumn::make('color'),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->since(),
            ])
            ->filters([
                DateRangeFilter::make('email_verified_at')
                    ->maxDate(now()->addMonth()),
            ]);
    }

    public function render()
    {
        return view('livewire.demo-table');
    }
}
