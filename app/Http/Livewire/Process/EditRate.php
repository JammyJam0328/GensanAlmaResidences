<?php

namespace App\Http\Livewire\Process;

use App\Models\{Rate, StayingHour, Type};
use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\{TextInput, Grid, Select};
use Filament\Notifications\Notification;
class EditRate extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public $staying_hour_id, $room_type_id, $amount;
    public $roomTypes=[],$stayingHours=[];
    public $isOpen = false;
    protected $listeners = [
        'edit' => 'edit',
    ];
    public $rate;
    public function edit($id)
    {
        $this->rate = Rate::find($id);
        $this->staying_hour_id = $this->rate->staying_hour_id;
        $this->room_type_id = $this->rate->type_id;
        $this->amount = $this->rate->amount;
        $this->isOpen = true;
    }
    protected function getFormSchema(): array
    {
        return [
            Grid::make(2)
                ->schema([
                    Select::make('staying_hour_id')
                        ->label('Select Hours')
                        ->validationAttribute('Select Hours')
                        ->required()
                        ->exists('staying_hours', 'id')
                        ->options($this->stayingHours),
                    Select::make('room_type_id')
                        ->label('Select Room Type')
                        ->validationAttribute('Room Type')
                        ->required()
                        ->exists('types', 'id')
                        ->options($this->roomTypes),
                    TextInput::make('amount')
                        ->label('Amount')
                        ->validationAttribute('Amount')
                        ->required()
                        ->rules('numeric')
                        ->type('number')
                        ->placeholder('ex. 100'),
                ])
        ];
    }
    public function update()
    {
        $this->validate();
        $this->rate->update([
            'staying_hour_id' => $this->staying_hour_id,
            'type_id' => $this->room_type_id,
            'amount' => $this->amount,
        ]);
        Notification::make()
                 ->success()
                 ->title('Success')
                 ->body('Rate has been updated successfully')
                 ->send();
        $this->reset('staying_hour_id', 'room_type_id', 'amount');
        $this->isOpen = false;
        $this->emit('refreshTable');
    }
    public function render()
    {
        return view('livewire.process.edit-rate');
    }
}
