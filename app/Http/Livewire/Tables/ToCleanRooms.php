<?php

namespace App\Http\Livewire\Tables;

use App\Models\Cleaning;
use App\Models\Room;
use Livewire\Component;
use App\Models\Designation;

class ToCleanRooms extends Component
{
    public $current_assigned_floor;
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
        $room = Room::where('id',$room_id)->first();
        $room->update([
            'room_status_id' => 8
        ]);
        auth()->user()->room_boy->update([
            'is_cleaning' => 1,
            'room_id' => $room_id,
        ]);
    }
    public function render()
    {
        return view('livewire.tables.to-clean-rooms',[
            'rooms'=>  Room::query()
                        ->where('floor_id', $this->designation->floor_id)
                        ->where('room_status_id', 7)
                        ->get()
        ]);
    }
}
