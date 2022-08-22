<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;
use App\Models\Room;
use Livewire\WithPagination;
class RoomListAndStatuses extends Component
{
    use WithPagination;
    public $search='';
    public $filter=[
        'floor'=>'',
        'room_status'=>'',
    ];
    public $floors=[],$roomStatuses=[];

    public function render()
    {
        return view('livewire.tables.room-list-and-statuses',[
            'rooms'=>Room::query()
                    ->when($this->search!="",function($query){
                        $query->where('number','like','%'.$this->search.'%');
                    })
                    ->when($this->filter['floor'],function($query){
                        $query->where('floor_id',$this->filter['floor']);
                    })
                    ->when($this->filter['room_status'],function($query){
                        $query->where('room_status_id',$this->filter['room_status']);
                    })
                    ->with(['floor','room_status','types'])
                    ->paginate(10)
        ]);
    }
}
