<?php

namespace App\Http\Livewire\Process;

use App\Models\CheckInDetail;
use App\Models\Guest;
use App\Models\Room;
use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;
use App\Traits\confirmDialog;

class ViewAndCheckIn extends Component
{
    use confirmDialog;
    public $isOpen = false;
    protected $listeners = ['viewGuest' => 'setGuest', 'checkIn'];
    public $real_id;
    public function setGuest($id)
    {
        $this->real_id = $id;
        $this->isOpen = true;
    }
    public function pay($transaction_id)
    {
        $transaction = Transaction::find($transaction_id);
        $transaction->paid_at = Carbon::now();
        $transaction->save();
    }
    public function cancelPayment($transaction_id)
    {
        $transaction = Transaction::find($transaction_id);
        $transaction->paid_at = null;
        $transaction->save();
    }
    public function confirmCheckIn()
    {

        $this->confirm([
            'title' => 'Confirm Check In',
            'description' => 'Are you sure you want to check in this guest?',
            'confirmMethod' => 'checkIn',
        ]);
    }
    public function checkIn()
    {
        $selected_guest = Guest::query()
            ->where('id', $this->real_id)
            ->with([
                'transactions' => function ($query) {
                    return $query->where('transaction_type_id', 1)->with(['check_in_detail' => ['room']]);
                }
            ])
            ->first();
        foreach ($selected_guest->transactions as  $check_in_transaction) {
            $check_in_detail = CheckInDetail::where('transaction_id', $check_in_transaction->id)->first();
            $check_in_detail->update([
                'check_in_at' => Carbon::now(),
                'expected_check_out_at' => Carbon::now()->addHours($check_in_transaction->check_in_detail->static_hours_stayed),
            ]);
            Room::where('id', $check_in_detail->room_id)->update([
                'room_status_id' => 2,
            ]);
        }

        $selected_guest->update([
            'is_checked_in' => true,
            'check_in_at' => Carbon::now(),
        ]);
        $this->isOpen = false;
        $this->emit('refreshRecentCheckInList');
    }
    public function render()
    {
        return view('livewire.process.view-and-check-in', [
            'guest' => $this->real_id != null ? Guest::where('id', $this->real_id)->with([
                'transactions.transaction_type',
                'transactions.check_in_detail.room',
                'transactions.check_in_detail.rate.type',
                'transactions.check_in_detail.rate.staying_hour',
            ])->first() : null,
        ]);
    }
}
