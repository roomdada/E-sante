<?php

namespace App\Http\Livewire\Suggestions;

use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;

class CreateSuggestion extends Component implements HasForms
{
    use \Filament\Forms\Concerns\InteractsWithForms;

    public $title, $description;

    public function mount()
    {
      $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            \Filament\Forms\Components\TextInput::make('title')
                ->label('Titre')
                ->required()
                ->rules('required', 'string', 'max:255'),
            \Filament\Forms\Components\Textarea::make('description')
                ->label('Description')
                ->required()
                ->rules('required', 'string'),
        ];
    }

    public function submit()
    {
      $this->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
      ]);
      
      auth()->user()->suggestions()->create([
        'title' => $this->title,
        'description' => $this->description,
      ]);

      Notification::make()->title('Le suggestion a été ajoutée avec succes!')->success()->iconColor('success')->send();
      return redirect()->route('suggestions.index');
    }
    public function render()
    {
        return view('livewire.suggestions.create-suggestion');
    }
}
