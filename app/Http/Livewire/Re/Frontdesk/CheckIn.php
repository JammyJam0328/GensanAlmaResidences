<?php

namespace App\Http\Livewire\Re\Frontdesk;

use App\Models\Guest;
use Livewire\Component;
use Livewire\WithPagination;

class CheckIn extends Component
{
    use WithPagination;
    public $search,$searchBy='1',$realSearch;
    protected $listeners = ['refreshRecentCheckInList'=>'clearSearches'];
    public function searchReal()
    {
        $this->realSearch = $this->search;
        $this->reset('search');
    }
    public function clearSearches()
    {
        $this->realSearch = '';
        $this->search = '';
        $this->searchBy = '1';
    }
    public function render()
    {
        return view('livewire.re.frontdesk.check-in', [
            'guests' => Guest::query()
                ->when($this->realSearch, function ($query) {
                    switch ($this->searchBy) {
                        case '1':
                            return $query->where('qr_code',$this->realSearch );
                            break;
                        case '2':
                            return $query->where('name','like','%'.$this->realSearch.'%' );
                            break;
                        case '3':
                            return $query->where('contact_number',$this->realSearch );
                            break;
                    }
                })
                ->where('is_checked_in', false)
                ->paginate(10),
        ]);
    }
}
