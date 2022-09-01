<?php

namespace App\Http\Livewire\Tables;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;
class RoomsMonitoring extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.tables.rooms-monitoring',[
            'rooms'=>Room::paginate(10),
        ]);
    }
}
