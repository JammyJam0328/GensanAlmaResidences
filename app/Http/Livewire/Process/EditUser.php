<?php

namespace App\Http\Livewire\Process;

use Filament\Forms;
use App\Models\User;
use Livewire\Component;
use Filament\Notifications\Notification;
use Filament\Forms\Components\{TextInput, Grid, Select};
class EditUser extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public $name, $email,$role_id;
    public $roles=[];
    public $user;
    protected $listeners = ['edit'];
    public $isOpen = false;
    public function edit($id)
    {
        $this->user = User::find($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role_id = $this->user->role_id;
        $this->isOpen = true;
    }
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
                        ->email(),
                    Select::make('role_id')
                        ->label('Role')
                        ->validationAttribute('Role')
                        ->required()
                        ->options($this->roles),
                ])
        ];
    }
    public function update()
    {
        $this->validate();
        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => $this->role_id,
        ]);
        Notification::make()
                ->success()
                ->body('User has been updated successfully')
                ->send();
        $this->reset('name', 'email','role_id');
        $this->emit('refreshTable');
        $this->isOpen = false;
    }
    public function render()
    {
        return view('livewire.process.edit-user');
    }
}
