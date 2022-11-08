<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Actions\User\CreateUser;
use App\Events\PatientCreated;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class AddUserForm extends Component implements HasForms
{
    use InteractsWithForms;
    public $first_name, $last_name, $email, $contact, $occupation, $location, $parent_id, $photo, $role, $gender, $birthday_at;

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
            Select::make('user_type_id')
                      ->label('Type de patient')
                      ->columnSpan(2)
                      ->options(\App\Models\UserType::pluck('name', 'id'))
                      ->required()
                      ->rules('required', 'exists:user_types,id'),
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
            Select::make('parent_id')->label('Enfant de')->columnSpan(2)->options(\App\Models\User::patient()->pluck('full_name', 'id')),
          ])
      ];
    }

    public function submit(CreateUser $createUser)
    {
        $this->validate([
          'email' => 'nullable|email|max:255|unique:users,email',
        ]);
        $user = $createUser->execute($this->form->getState());
        if($this->user_attachment){
          foreach ($this->user_attachment as $key => $value) {
            $user->addMedia($value)->toMediaCollection('default');
          }
        }

        PatientCreated::dispatch($user);

        Notification::make()->title('Le patient a été ajouté avec succes!')->success()->iconColor('success')->send();
        return redirect()->route('patients.index');
    }


    public function render()
    {
        return view('livewire.users.add-user-form');
    }
}
