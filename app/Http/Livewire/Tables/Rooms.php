<?php

namespace App\Http\Livewire\Tables;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class Rooms extends Component
{
    use WithPagination;
    public $floors=[],$roomStatuses=[];
    protected $listeners = [
        'refreshTable' => '$refresh',
    ];
    public $filter=[
        'floor'=>'',
        'room_status'=>'',
    ];
    public function render()
    {
        return view('livewire.tables.rooms',[
            'rooms'=>Room::query()
                    ->when($this->filter['floor'],function($query){
                        return $query->where('floor_id',$this->filter['floor']);
                    })
                    ->when($this->filter['room_status'],function($query){
                        return $query->where('room_status_id',$this->filter['room_status']);
                    })
                    ->with(['floor','room_status','types'])
                    ->paginate(10)
        ]);
    }
}
