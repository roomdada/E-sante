<?php

namespace App\Http\Livewire\Suggestions;

use Filament\Tables\Contracts\HasTable;
use Livewire\Component;

class ListSuggestion extends Component implements HasTable
{
    use \Filament\Tables\Concerns\InteractsWithTable;

    public $title, $description;

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return \App\Models\Suggestion::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            \Filament\Tables\Columns\TextColumn::make('created_at')->label('Date'),
            \Filament\Tables\Columns\TextColumn::make('title')->label('Titre'),
            \Filament\Tables\Columns\TextColumn::make('description')->label('Description'),
        ];
    }
    public function render()
    {
        return view('livewire.suggestions.list-suggestion');
    }
}
