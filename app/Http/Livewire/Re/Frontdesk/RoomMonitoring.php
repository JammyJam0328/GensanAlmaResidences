<?php

namespace App\Http\Livewire\Re\Frontdesk;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;
class RoomMonitoring extends Component
{
    use WithPagination;
    public $search='';
    public function render()
    {
        return view('livewire.re.frontdesk.room-monitoring',[
            'rooms'=>Room::query()
                    ->when($this->search!='',function($query){
                        return $query->where('number','like','%'.$this->search.'%');
                    })
                    ->with([
                        'floor',
                        'room_status',
                        'check_in_details'=> function ($query) {
                            return $query->where('check_out_at', null);
                        }
                    ])
                    ->paginate(10)
        ]);
    }
}
