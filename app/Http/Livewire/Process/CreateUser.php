<?php

namespace App\Http\Livewire\Process;
use Filament\Forms;
use App\Models\User;
use App\Models\RoomBoy;
use Livewire\Component;
use Filament\Notifications\Notification;
use Filament\Forms\Components\{TextInput, Grid, Select};

class CreateUser extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public $name, $email, $password,$role_id;
    public $roles=[];
    protected function getFormSchema(): array
    {
        return [
            Grid::make(2)
                ->schema([
                    TextInput::make('name')
                        ->label('Name')
                        ->required()
                        ->validationAttribute('Name')
                        ->placeholder('ex. John Doe'),
                    TextInput::make('email')
                        ->label('Email')
                        ->required()
                        ->validationAttribute('Email')
                        ->unique('users', 'email')
                        ->email(),
                    TextInput::make('password')
                        ->label('Password')
                        ->required()
                        ->validationAttribute('Password')
                        ->password()
                        ->minLength(8),
                    Select::make('role_id')
                        ->label('Role')
                        ->validationAttribute('Role')
                        ->required()
                        ->options($this->roles),
                ])
        ];
    }
    public function save()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role_id' => $this->role_id,
        ]);
        if ($this->role_id == 5) {
            RoomBoy::create([
                'user_id' => $user->id,
            ]);
        }
        Notification::make()
                ->success()
                ->body('User has been created successfully')
                ->title('Success')
                ->send();
        $this->reset('name', 'email', 'password');
        $this->emit('refreshTable');
        $this->dispatchBrowserEvent('close-create-modal');
    }
    public function render()
    {
        return view('livewire.process.create-user');
    }
}
