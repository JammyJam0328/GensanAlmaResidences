<?php

namespace App\Http\Livewire\Tables;
use App\Models\Floor;
use Livewire\Component;
use Livewire\WithPagination;
class Designations extends Component 
{
    use WithPagination;
    public function render()
    {
        return view('livewire.tables.designations',[
            'floors' => Floor::withCount('rooms')->paginate(10)
        ]);
    }
}
