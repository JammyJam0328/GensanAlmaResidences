<?php

namespace App\Http\Livewire\Process;

use Filament\Forms;
use App\Models\User;
use App\Models\RoomBoy;
use Livewire\Component;
use App\Models\Designation;
use Filament\Notifications\Notification;
use Filament\Forms\Components\{TextInput, Grid, Select};

class ManageDesignation extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public $isOpen = false;
    protected $listeners = ['manageFloorCleaners'];
    public $floor_id;
    public $user_id;
    public function manageFloorCleaners($id)
    {
        $this->floor_id = $id;
        $this->isOpen = true;
    }
    protected function getFormSchema(): array
    {
        return [
            Select::make('user_id')
                ->label('Select')
                ->placeholder('Select Room Boy')
                ->options(User::where('role_id', 5)->pluck('name', 'id'))
                ->searchable()
                ->required(),
        ];
    }
    public function assign()
    {
        $this->validate();
        $room_boy = RoomBoy::where('user_id', $this->user_id)->first();
        $alreadyAssigned = Designation::where('room_boy_id', $room_boy->id)
            ->where('floor_id', $this->floor_id)
            ->where('current', 1)
            ->exists();
        if ($alreadyAssigned) {
            Notification::make()
                ->danger()
                ->body('User already assigned to this floor')
                ->send();
            return;
        }
        Designation::where('room_boy_id', $room_boy->id)
            ->where('current', 1)->update([
                'current' => 0,
            ]);
        Designation::create([
            'room_boy_id' => $room_boy->id,
            'floor_id' => $this->floor_id,
        ]);
        Notification::make()
            ->success()
            ->body('User has been assigned successfully')
            ->send();
    }
    public function render()
    {
        return view('livewire.process.manage-designation', [
            'designations' => $this->floor_id != '' ? Designation::query()
                ->where('floor_id', $this->floor_id)
                ->where('current', 1)
                ->with(['room_boy.user'])
                ->get() : []
        ]);
    }
}
