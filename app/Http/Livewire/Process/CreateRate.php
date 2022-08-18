<?php

namespace App\Http\Livewire\Process;

use App\Models\{Rate, StayingHour, Type};
use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\{TextInput, Grid, Select};
use Filament\Notifications\Notification;
class CreateRate extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $staying_hour_id, $room_type_id, $amount;
    public $roomTypes=[],$stayingHours=[];
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
    public function save()
    {
        $this->validate();
        Rate::create([
            'staying_hour_id' => $this->staying_hour_id,
            'type_id' => $this->room_type_id,
            'amount' => $this->amount,
        ]);
       Notification::make()
                ->success()
                ->title('Success')
                ->body('Rate has been created successfully')
                ->send();
        $this->reset('staying_hour_id', 'room_type_id', 'amount');
        $this->emit('refreshTable');
    }
    public function mount()
    {
    }
    public function render()
    {
        return view('livewire.process.create-rate');
    }
}
