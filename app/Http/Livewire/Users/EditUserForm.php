<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use App\Actions\User\EditUser;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Notifications\Notification;

class EditUserForm extends Component implements HasForms
{

  use InteractsWithForms;

  public $first_name, $last_name, $email, $contact, $occupation, $location, $parent_id, $photo, $role, $gender, $birthday_at;
  public $patient;

  public function mount(User $user) : void 
  {
      $this->patient = $user;

      $this->form->fill([
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'email' => $user->email,
        'contact' => $user->contact,
        'occupation' => $user->occupation,
        'location' => $user->location,
        'parent_id' => $user->parent_id,
        'photo' => $user->photo,
        'role' => $user->role,
      ]);
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
          SpatieMediaLibraryFileUpload::make('user_attachment')->multiple()->label('Photo')->columnSpan(2),
          Select::make('parent_id')->label('Enfant de')->columnSpan(2)->options(\App\Models\User::patient()->pluck('full_name', 'id')),
        ])
    ];
  }

  public function submit(EditUser $editUser)
  {
    $this->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'nullable|string|email|max:255',
      'contact' => 'nullable|string|max:255',
      'occupation' => 'nullable|string|max:255',
      'location' => 'nullable|string|max:255',
      'parent_id' => 'nullable|exists:users,id',
      'gender' => 'required|string|max:255',
      'birthday_at' => 'required|date',
    ]);

    $editUser->execute($this->form->getState(), $this->patient);
    Notification::make()->title('Le patient a été mis à jour avec succès.')->success()->iconColor('success')->send();
    return redirect()->route('patients.index');
  }
  
    public function render()
    {
        return view('livewire.users.edit-user-form');
    }
}
