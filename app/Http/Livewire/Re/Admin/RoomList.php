<?php

namespace App\Http\Livewire\Re\Admin;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;
class RoomList extends Component
{
    use WithPagination;
    public $floors=[],$roomStatuses=[];
    protected $listeners = [
        'refreshTable' => '$refresh',
    ];
    public $filter=[
        'floor'=>'all',
        'room_status'=>'all',
    ];
    public function render()
    {
        return view('livewire.re.admin.room-list',[
            'rooms'=>Room::query()
                    ->when($this->filter['floor']!='all',function($query){
                        return $query->where('floor_id',$this->filter['floor']);
                    })
                    ->when($this->filter['room_status']!='all',function($query){
                        return $query->where('room_status_id',$this->filter['room_status']);
                    })
                    ->with(['floor','room_status','type'])
                    ->paginate(10)
        ]);
    }
}
