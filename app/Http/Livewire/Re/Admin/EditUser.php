<?php

namespace App\Http\Livewire\Re\Admin;

use Livewire\Component;
use Filament\Forms;
use App\Models\User;
use Filament\Forms\Components\{TextInput, Grid, Select};
use WireUi\Traits\Actions;
class EditUser extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms, Actions;
    public $name, $email,$role_id;
    public $roles=[];
    public $user;
    protected $listeners = ['editUser'];
    public $modalOpen = false;
    public function editUser($id)
    {
        $this->user = User::find($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role_id = $this->user->role_id;
        $this->modalOpen = true;
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
        $this->notification()->success(
            $title = 'Success',
            $description = 'User has been updated successfully'
        );
        $this->reset('name', 'email','role_id');
        $this->emit('refreshTable');
        $this->modalOpen = false;
    }
    public function render()
    {
        return view('livewire.re.admin.edit-user');
    }
}
