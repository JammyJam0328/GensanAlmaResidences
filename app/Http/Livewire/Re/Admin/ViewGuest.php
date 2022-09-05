<?php

namespace App\Http\Livewire\Re\Admin;

use App\Models\Guest;
use Livewire\Component;

class ViewGuest extends Component
{
    protected $listeners=['viewGuest'=>'setGuest'];
    public $guest=null;
    public function setGuest($guest_id)
    {
        $this->guest=Guest::find($guest_id);
        $this->dispatchBrowserEvent('guest-ready');
    }
    public function render()
    {
        return view('livewire.re.admin.view-guest',[
            'transactions'=>$this->guest != null ? $this->guest->transactions()->with(['transaction_type','check_in_detail.room'])->orderBy('created_at','desc')->get() : null
        ]);
    }
}
