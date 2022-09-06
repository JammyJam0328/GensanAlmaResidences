<?php

namespace App\Http\Livewire\Re\Frontdesk;

use App\Models\Guest;
use Livewire\Component;
use Livewire\WithPagination;
class RecentCheckInList extends Component
{
    use WithPagination;
    protected $listeners = ['refreshRecentCheckInList'=>'$refresh'];
    public function render()
    {
        return view('livewire.re.frontdesk.recent-check-in-list',[
            'guests'=>Guest::query()
                ->where('is_checked_in', true)
                ->orderBy('check_in_at', 'desc')
                ->paginate(10),
        ]);
    }
}
