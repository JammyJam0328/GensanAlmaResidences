<?php

namespace App\Http\Livewire\Tables;

use App\Models\Guest;
use Livewire\Component;
use Livewire\WithPagination;

class CheckIn extends Component
{
    use WithPagination;
    public $search,$searchBy='1',$realSearch;
    protected $listeners = ['refreshRecentCheckInList'=>'clearSearches'];
    public function clearSearches()
    {
        $this->realSearch = '';
        $this->search = '';
        $this->searchBy = '1';
    }
    public function updatedSearch()
    {
        $this->realSearch = $this->search;
        if ($this->searchBy == '1') {
            $this->reset('search');
        }
    }
    public function updatedSearchBy()
    {
        $this->dispatchBrowserEvent('focus-search-bar');
    }
    public function render()
    {
        return view('livewire.tables.check-in', [
            'inline_guests' => Guest::query()
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
