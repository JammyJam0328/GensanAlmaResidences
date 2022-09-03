<?php

namespace App\Http\Livewire\Tables;

use Carbon\Carbon;
use App\Models\Room;
use Livewire\Component;
use App\Models\Cleaning;
use App\Models\Designation;
use App\Traits\confirmDialog;
use Filament\Forms\Components\Card;
use WireUi\Traits\Actions;

class ToCleanRooms extends Component
{
    use confirmDialog, Actions;
    public $current_assigned_floor;
    public $room;
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
        $this->dialog([
            'title'       => 'Are you Sure?',
            'description' => 'Do you want to continue this action?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, save it',
                'method' => 'confirmStartRoomCleaning',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function confirmStartRoomCleaning()
    {
        $room = Room::where('id', $this->room)->first();
        $room->update([
            'room_status_id' => 8
        ]);
        Cleaning::create([
            'room_boy_id' => auth()->user()->room_boy->id,
            'room_id' => $room->id,
            'suppose_to_start' => $room->time_to_clean,
            'start_at' => Carbon::now(),
        ]);
        auth()->user()->room_boy->update([
            'is_cleaning' => 1,
            'room_id' => $this->room,
        ]);
    }
    public function finish($room_id)
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Do you want to continue this action?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, save it',
                'method' => 'confirmFinish',
                'params' => $room_id,
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }
    public function confirmFinish($room_id)
    {
        $room = Room::where('id', $room_id)->first();
        $delayed = $room->time_to_clean < Carbon::now();
        $room->update([
            'room_status_id' => 1,
            'time_to_clean' => null,
        ]);
        $cleaning = Cleaning::where('room_id', $room_id)->where('finish_at', null)->first();
        $cleaning->update([
            'finish_at' => Carbon::now(),
            'delayed' => $delayed,
        ]);
        auth()->user()->room_boy->update([
            'is_cleaning' => 0,
            'room_id' => null,
        ]);
        $this->notification()->success(
            $title = 'Finish',
            $description = 'Room is now ready to use',
        );
    }
    public function render()
    {
        return view('livewire.tables.to-clean-rooms', [
            'rooms' =>  Room::query()
                ->where('floor_id', $this->designation->floor_id)
                ->whereIn('room_status_id', [7, 8])
                ->get()
        ]);
    }
}
