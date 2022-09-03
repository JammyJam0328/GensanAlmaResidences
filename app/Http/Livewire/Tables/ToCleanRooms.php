<?php

namespace App\Http\Livewire\Tables;

use Carbon\Carbon;
use App\Models\Room;
use Livewire\Component;
use App\Models\Cleaning;
use App\Models\Designation;
use App\Traits\confirmDialog;

class ToCleanRooms extends Component
{
    use confirmDialog;
    public $current_assigned_floor;
    public $room;
    protected $listeners = ['confirmStartRoomCleaning'];
    public function getDesignationProperty()
    {
        return Designation::query()
            ->where('room_boy_id', auth()->user()->room_boy->id)
            ->where('current', 1)
            ->with(['floor'])
            ->first();
    }
    public function startRoomCleaning($room_id)
    {
        if (auth()->user()->room_boy->is_cleaning) {
            return;
        }
        $this->room = $room_id;
        $this->confirm([
            'title' => 'Confirm',
            'description' => 'Do you want to continue?',
            'confirmMethod' => 'confirmStartRoomCleaning',
        ]);
    }

    public function confirmStartRoomCleaning()
    {
        $room = Room::where('id',$this->room)->first();
        $room->update([
            'room_status_id' => 8
        ]);
        Cleaning::create([
            'room_boy_id' => auth()->user()->room_boy->id,
            'room_id' => $room->id,
        ]);
        auth()->user()->room_boy->update([
            'is_cleaning' => 1,
            'room_id' => $this->room,
        ]);
    }
    public function finish($room_id)
    {
        
    }
    public function render()
    {
        return view('livewire.tables.to-clean-rooms',[
            'rooms'=>  Room::query()
                        ->where('floor_id', $this->designation->floor_id)
                        ->whereIn('room_status_id', [7,8])
                        ->get()
        ]);
    }
}
