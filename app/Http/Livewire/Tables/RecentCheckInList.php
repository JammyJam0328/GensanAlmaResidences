<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;
use App\Models\Guest;
use Livewire\WithPagination;
class RecentCheckInList extends Component
{
    use WithPagination;
    protected $listeners = ['refreshRecentCheckInList'=>'$refresh'];
    public function render()
    {
        return view('livewire.tables.recent-check-in-list',[
            'guests'=>Guest::query()
                ->where('is_checked_in', true)
                ->orderBy('check_in_at', 'desc')
                ->paginate(10),
        ]);
    }
}
