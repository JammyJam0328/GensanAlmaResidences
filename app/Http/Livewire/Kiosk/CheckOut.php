<?php

namespace App\Http\Livewire\Kiosk;

use App\Models\Guest;
use App\Models\Transaction;
use Livewire\Component;

class CheckOut extends Component
{

    public $scanner;
    public $guest;
    public $scannerpanel=true;

    public function render()
    {
        return view('livewire.kiosk.check-out',[
            'transactions' => Transaction::where('guest_id', 'like', '%'.$this->guest.'%')->get(),
            'guests' => Guest::where('qr_code', 'like', '%'.$this->scanner.'%')->first(),
        ]);
    }

    public function updatedScanner()
    {
        $this->guest = Guest::where('qr_code', 'like', '%'.$this->scanner.'%')->first()->id;
        $this->scannerpanel = false;
    }
}
