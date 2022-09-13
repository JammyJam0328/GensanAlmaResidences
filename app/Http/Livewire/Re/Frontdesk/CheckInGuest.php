<?php

namespace App\Http\Livewire\Re\Frontdesk;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Guest;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Transaction;
use App\Models\CheckInDetail;

class CheckInGuest extends Component
{
    use Actions;
    public $modalOpen = false;
    protected $listeners = ['setGuest'];
    public $guest = null;
    public function setGuest($guest_id)
    {
        $this->guest = Guest::find($guest_id);
        $this->modalOpen = true;
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
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Are you sure you want to check in this guest?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Check In',
                'method' => 'checkIn',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }
    public function checkIn()
    {
        $this->guest->transactions()->update(['paid_at' => Carbon::now()]);
        foreach ($this->guest->transactions->where('transaction_type_id',1) as  $check_in_transaction) {
            $check_in_detail = CheckInDetail::where('transaction_id', $check_in_transaction->id)->first();
            $check_in_detail->update([
                'check_in_at' => Carbon::now(),
                'expected_check_out_at' => Carbon::now()->addHours($check_in_transaction->check_in_detail->static_hours_stayed),
            ]);
            Room::where('id', $check_in_detail->room_id)->update([
                'room_status_id' => 2,
            ]);
        }
        $this->guest->update([
            'is_checked_in' => true,
            'check_in_at' => Carbon::now(),
        ]);
        $this->modalOpen = false;
        $this->emit('refreshRecentCheckInList');
        $this->notification()->success(
            $title = 'Success!',
            $description = 'Guest has been checked in.',
        );
    }
    public function render()
    {
        return view('livewire.re.frontdesk.check-in-guest', [
            'transactions' => $this->guest != null ? $this->guest->transactions()->with(['transaction_type', 'check_in_detail.room'])->orderBy('created_at', 'desc')->get() : null
        ]);
    }
}
