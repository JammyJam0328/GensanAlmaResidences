<?php

namespace App\Http\Livewire\Process;

use App\Models\Guest;
use Livewire\Component;

class ScanQrCheckIn extends Component
{
    public $guest;
    public $qr_code;
    public $store_qr_code;
    public function updatedQrCode()
    {
        $this->store_qr_code = $this->qr_code;
        $this->guest = Guest::where('qr_code', $this->store_qr_code)->first();
        $this->reset('qr_code');
    }
    public function removeGuest()
    {
        $this->reset('store_qr_code');
    }
    
    public function render()
    {
        return view('livewire.process.scan-qr-check-in');
    }
}
