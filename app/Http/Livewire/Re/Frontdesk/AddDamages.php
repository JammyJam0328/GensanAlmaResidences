<?php

namespace App\Http\Livewire\Re\Frontdesk;

use App\Models\Guest;
use App\Models\Transaction;
use Livewire\Component;

class AddDamages extends Component
{
    public $modalOpen=false;
    protected $listeners = ['openModal'];
    public $guest_id;
    public $room_id;
    public $damages = [
        'Remote Control',
        'Door Lock',
        'TV',
        'Outlet',
        'Curtains',
        'Bed Sheets',
        'Pillow',
        'Blanket',
        'Towel',
        'Toilet Paper',
        'Toothbrush',
        'Toothpaste',
    ];
    public function openModal($guest_id,$room_id)
    {
        $this->guest_id = $guest_id;
        $this->room_id = $room_id;
        $this->modalOpen = true;
    }
    public function render()
    {
        return view('livewire.re.frontdesk.add-damages');
    }
}
