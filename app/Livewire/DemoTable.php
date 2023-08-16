<?php

namespace App\Livewire;

use App\Models\User;
use App\Tables\Columns\ColorColumn;
use App\Tables\Filters\DateRangeFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
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
