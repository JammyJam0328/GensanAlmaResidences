<?php

namespace App\Http\Livewire\Process;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Guest;
use Livewire\Component;
use App\Models\Transaction;
use App\Models\CheckInDetail;
use App\Traits\confirmDialog;
use Filament\Notifications\Notification;

class CheckOut extends Component
{
    use confirmDialog;
    public $realSearch = '', $searchBy = '1', $search = '';
    public $transaction_id;
    protected $listeners = ['checkOutConfirm', 'payConfirm', 'totalyCheckOutConfirm'];
    public function getGuestProperty()
    {
        if ($this->realSearch != '') {
            switch ($this->searchBy) {
                case '1':
                    return $this->searchByQrCode();
                    break;
                case '2':
                    return $this->searchByRoom();
                    break;
                case '3':
                    return $this->searchByContactNumber();
                    break;
            }
        } else {
            return false;
        }
    }
    public function search()
    {
        $this->realSearch = $this->search;
        $this->reset('search');
    }
    public function searchByQrCode()
    {
        return Guest::query()
            ->where('qr_code', $this->realSearch)
            ->where('is_checked_in', 1)
            ->where('totaly_checked_out', 0)
            ->whereHas('transactions.check_in_detail', function ($query) {
                return $query->where('check_in_at', '!=', null);
            })
            ->with([
                'transactions' => [
                    'check_in_detail' => [
                        'room'
                    ]
                ]
            ])
            ->first();
    }
    public function searchByContactNumber()
    {
        return Guest::query()
            ->where('contact_number', $this->realSearch)
            ->where('is_checked_in', 1)
            ->where('totaly_checked_out', 0)
            ->whereHas('transactions.check_in_detail', function ($query) {
                return $query->where('check_in_at', '!=', null);
            })
            ->with([
                'transactions' => [
                    'check_in_detail' => [
                        'room'
                    ]
                ]
            ])
            ->first();
    }
    public function searchByRoom()
    {
        $room = Room::where('number', $this->realSearch)->first();
        $check_in_detail = CheckInDetail::query()
            ->where('room_id', $room->id)
            ->where('check_in_at', '!=', null)
            ->where('check_out_at', null)
            ->first();
        $guest = $check_in_detail->transaction->guest;
        if ($guest->is_checked_in == 1 && $guest->totaly_checked_out == 0) {
            return $guest;
        } else {
            return false;
        }
    }
    public function checkOut($transaction_id)
    {
        $this->transaction_id = $transaction_id;
        $this->confirm([
            'title' => 'Confirm Check Out ',
            'description' => 'Are you sure you want to check out this room?',
            'confirmMethod' => 'checkOutConfirm',
        ]);
    }
    public function checkOutConfirm()
    {
        $transaction = Transaction::find($this->transaction_id);
        $transaction->check_in_detail->update([
            'check_out_at' => Carbon::now(),
        ]);
        $transaction->check_in_detail->room->update([
            'room_status_id' => 7,
            'time_to_clean' => Carbon::now()->addHours(3)  // with in 3 hours after check out, the room must be cleaned by the bell boy
        ]);
        Notification::make()
            ->success()
            ->title('Check Out Successful')
            ->send();
    }
    public function pay($transaction_id)
    {
        $this->transaction_id = $transaction_id;
        $this->confirm([
            'title' => 'Confirm Payment',
            'description' => "Are you sure you want to pay this transaction?",
            'confirmMethod' => 'payConfirm',
        ]);
    }

    public function payConfirm()
    {
        $transaction = Transaction::find($this->transaction_id);
        $transaction->update([
            'paid_at' => Carbon::now(),
        ]);
        Notification::make()
            ->success()
            ->title('Payment Successful')
            ->send();
    }

    public function totalyCheckOutGuest()
    {
        foreach ($this->guest->transactions->where('transaction_type_id', 1) as $transaction) {
            if ($transaction->check_in_detail->check_out_at == null) {
                Notification::make()
                    ->danger()
                    ->title('Please check out all rooms first')
                    ->send();
                return;
            }
        }
        $this->confirm([
            'title' => 'Confirm Check Out',
            'description' => "Are you sure you want to check out this guest?",
            'confirmMethod' => 'totalyCheckOutConfirm',
        ]);
    }

    public function totalyCheckOutConfirm()
    {
        if ($this->guest->transactions->where('paid_at', null)->count() == 0) {
            $this->guest->update([
                'totaly_checked_out' => 1,
            ]);
            Notification::make()
                ->success()
                ->title('Guest has been checked out successfully')
                ->send();
            $this->realSearch = '';
        } else {
            Notification::make()
                ->danger()
                ->title('Please settle the transaction bills first')
                ->send();
            return;
        }
    }
    public function render()
    {
        return view('livewire.process.check-out');
    }
}
