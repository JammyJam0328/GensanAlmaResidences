<?php

namespace App\Http\Livewire\Re\Admin;

use App\Models\{Rate, StayingHour, Type};
use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\{TextInput, Grid, Select};
use WireUi\Traits\Actions;
class CreateRate extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms, Actions;
    public $modalOpen=false;
    protected $listeners = ['createRate'];
    public $staying_hour_id, $room_type_id, $amount;
    public $roomTypes=[],$stayingHours=[];
    public function createRate()
    {
        $this->modalOpen=true;
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
                        ->minValue(1)
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
        $this->notification()->success(
            $title = 'Success',
            $description = 'Rate has been created successfully'
        );
        $this->reset('staying_hour_id', 'room_type_id', 'amount');
        $this->emit('refreshTable');
        $this->modalOpen=false;
    }
    public function render()
    {
        return view('livewire.re.admin.create-rate');
    }
}
