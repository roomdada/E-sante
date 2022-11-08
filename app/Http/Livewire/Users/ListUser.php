<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Concerns\InteractsWithTable;


class ListUser extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder 
    {
        return User::query()->patient()->latest();
    } 

    protected function getTableColumns(): array 
    {
        return [
          TextColumn::make('identifier')->label('Matricule'),
          ImageColumn::make('image')->label('Photo')->width(80)->height(80),
          TextColumn::make('full_name')->label('Nom complet'),
          TextColumn::make('email')->label('Email'),
        ];
    }


    protected function getTableActions(): array
    {
        return [
          Action::make('edit')->label('Modifier')
            ->icon('heroicon-o-pencil-alt')
            ->color('info')
            ->url(fn (User $record): string => route('patients.edit', $record)),
            DeleteAction::make(),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
          SelectFilter::make('gender')
            ->options([
                'Homme' => 'Homme',
                'Femme' => 'Femme',
            ])->label('Sexe'),
        ];
    }

    protected function getTableRecordsPerPageSelectOptions(): array 
    {
        return [10, 25, 50, 100];
    } 
 
 
    public function render()
    {
        return view('livewire.users.list-user');
    }
}
