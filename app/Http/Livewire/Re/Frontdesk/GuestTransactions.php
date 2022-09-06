<?php

namespace App\Http\Livewire\Re\Frontdesk;

use App\Models\Guest;
use Livewire\Component;
use Livewire\WithPagination;

class GuestTransactions extends Component 
{
    use  WithPagination;
    public $guest = null;
    public $loadTransactions = false;
    public $search='';
    public $selected_guest=null;
    public function search()
    {
        $this->guest = Guest::where('qr_code', $this->search)
            ->where('is_checked_in', 1)
            ->where('totaly_checked_out', 0)
            ->first();
        if ($this->guest) {
            $this->loadTransactions = true;
        }
    }

    public function render()
    {
        return view('livewire.re.frontdesk.guest-transactions',[
            'transactions'=>$this->loadTransactions ? $this->guest->transactions()->with(['transaction_type','check_in_detail.room'])->get() : [],
        ]);
    }
}
