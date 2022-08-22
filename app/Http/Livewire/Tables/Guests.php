<?php

namespace App\Http\Livewire\Tables;

use App\Models\Guest;
use Livewire\Component;
use Livewire\WithPagination;
class Guests extends Component
{
    use WithPagination;
    public function setGuest($id)
    {
        $this->emit('setGuest', $id);
    }
    public function render()
    {
        return view('livewire.tables.guests',[
            'guests'=>Guest::query()
                ->where('is_checked_in', 1)
                ->where('totaly_checked_out', 0)
                ->paginate(10)
        ]);
    }
}
