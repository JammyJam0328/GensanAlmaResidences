<?php

namespace App\Http\Livewire\Re\Admin;

use Filament\Forms;
use App\Models\User;
use App\Models\RoomBoy;
use Livewire\Component;
use Filament\Forms\Components\{TextInput, Grid, Select};
use WireUi\Traits\Actions;

class CreateUser extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms, Actions;
    public $modalOpen=false;
    protected $listeners = ['createUser'];
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
        $this->notification()->success(
            $title = 'User Created',
            $description = 'User has been created successfully',
        );
        $this->reset('name', 'email', 'password');
        $this->emit('refreshTable');
        $this->modalOpen=false;
    }
    public function createUser()
    {
        $this->modalOpen=true;
    }
    public function render()
    {
        return view('livewire.re.admin.create-user');
    }
}
