<?php

namespace App\Http\Livewire\Doctors;

use Livewire\Component;
use App\Events\PatientCreated;
use App\Actions\User\CreateUser;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class CreateDoctor extends Component implements HasForms
{
    use \Filament\Forms\Concerns\InteractsWithForms;

    public $first_name, $last_name, $email, $contact, $occupation, $location, $photo, $gender, $birthday_at;

    public function mount() : void 
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
      return  [
          Grid::make(4)->schema([
            TextInput::make('last_name')->label('Nom')
                      ->columnSpan(1)
                      ->required()
                      ->rules('required', 'string', 'max:255'),
            TextInput::make('first_name')
                      ->label('Prénoms')
                      ->columnSpan(1)
                      ->required()->rules('required', 'max:255'),
            TextInput::make('email')
                      ->label('E-mail')
                      ->rules('nullable', 'email', 'max:255')
                      ->columnSpan(2),
            TextInput::make('location')->label('Commune')->columnSpan(2),
            TextInput::make('contact')->label('Contact')->columnSpan(2),
            TextInput::make('occupation')->label('Fonction')->columnSpan(2),
            Select::make('gender')->label('Sexe')->columnSpan(2)->options(['Homme' => 'Homme', 'Femme' => 'Femme'])->required(),
            DatePicker::make('birthday_at')->label('Date de naissance')->columnSpan(2)->required(),
            SpatieMediaLibraryFileUpload::make('user_attachment')->multiple()->label('Photo')->required()->columnSpan(2),
          ])
      ];
    }

    public function submit(CreateUser $createDoctor)
    {
      $this->validate([
        'email' => 'nullable|email|max:255|unique:users,email',
      ]);
      
      $user = $createDoctor->execute(array_merge($this->form->getState(), ['role' => \App\Models\Role::DOCTOR]));

      if($this->user_attachment){
        foreach ($this->user_attachment as $key => $value) {
          $user->addMedia($value)->toMediaCollection('default');
        }
      }

      PatientCreated::dispatch($user);

      Notification::make()->title('Le compte du medecin a été ajouté avec succes!')->success()->iconColor('success')->send();
      return redirect()->route('medecins.index');
    }

    public function render()
    {
        return view('livewire.doctors.create-doctor');
    }
}
