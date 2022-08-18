<?php

namespace App\Http\Livewire\Process;

use App\Models\Room;
use App\Models\RoomType;
use App\Models\Type;
use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\{Checkbox, CheckboxList, TextInput, Grid, Select, Textarea, Toggle};
use Filament\Notifications\Notification;

class ManageRoomRates extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    protected $listeners = [
        'manage-room-rates' => 'manageRoomRates',
    ];
    public $isOpen = false;
    public $rate,$selected_type;
    public $types=[];
    public $roomRates=[];
    public $room;

    
    public function manageRoomRates($id)
    {
        $this->isOpen = true;
        $this->room = Room::find($id);
    }
    public function mount()
    {
        $this->types = Type::all('id', 'name');
        $this->roomRates = RoomType::where('room_id',$this->room?->id)->get();
    }
    public function render()
    {
        return view('livewire.process.manage-room-rates');
    }
}
