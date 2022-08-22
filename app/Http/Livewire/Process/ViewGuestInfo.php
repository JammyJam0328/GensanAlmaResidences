<?php

namespace App\Http\Livewire\Process;

use App\Models\Guest;
use Livewire\Component;

class ViewGuestInfo extends Component
{
    protected $listeners = ['setGuest'];
    public $guest;
    public $isOpen = false;
    public function setGuest($id)
    {
        $this->guest = Guest::query()
            ->where('id', $id)
            ->with([
                'transactions' => [
                    'check_in_detail' => [
                        'room',
                        'rate' => ['staying_hour','type']
                    ], 'transaction_type'
                ]
            ])
            ->first();
        $this->isOpen = true;
    }
    public function render()
    {
        return view('livewire.process.view-guest-info');
    }
}
