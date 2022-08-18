<?php

namespace App\Http\Livewire\Process;

use App\Models\{Floor, Room, RoomStatus};
use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\{CheckboxList, TextInput, Grid, Select, Textarea};
use Filament\Notifications\Notification;

class EditRoom extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public $number, $description, $floor_id, $room_status_id;
    public $floors = [], $roomStatuses = [],$types=[];
    public $selected_types=[];
    protected $listeners = [
        'edit' => 'edit',
    ];
    public $room;
    public $isOpen = false;
    protected function getFormSchema(): array
    {
        return [
            Grid::make(2)
                ->schema([
                    TextInput::make('number')
                        ->label('Number')
                        ->validationAttribute('Number')
                        ->required()
                        ->rules('numeric')
                        ->type('number')
                        ->placeholder('ex. 1'),
                    Select::make('floor_id')
                        ->label('Select Floor')
                        ->validationAttribute('Select Floor')
                        ->required()
                        ->exists('floors', 'id')
                        ->options($this->floors),
                    Select::make('room_status_id')
                        ->label('Select Room Status')
                        ->validationAttribute('Room Status')
                        ->required()
                        ->exists('room_statuses', 'id')
                        ->options($this->roomStatuses),
                ]),
            Textarea::make('description')
                ->label('Description')
                ->validationAttribute('Description')
                ->nullable()
                ->rules('string'),
            CheckboxList::make('selected_types')
                ->label('Select all applicable types for this room')
                ->required()
                ->validationAttribute('Room Types')
                ->options($this->types)
                ->columns(2),
        ];
    }
    public function edit($id)
    {
        $this->room = Room::find($id);
        $this->number = $this->room->number;
        $this->description = $this->room->description;
        $this->floor_id = $this->room->floor_id;
        $this->room_status_id = $this->room->room_status_id;
        $this->selected_types = $this->room->types->pluck('id')->toArray();
        $this->isOpen = true;
    }
    public function update()
    {
        $this->validate();
        $this->room->update([
            'number' => $this->number,
            'description' => $this->description,
            'floor_id' => $this->floor_id,
            'room_status_id' => $this->room_status_id,
        ]);
        $this->room->types()->sync($this->selected_types);
        $this->reset('number', 'description', 'floor_id', 'room_status_id');
        Notification::make()
            ->success()
            ->body('Room has been updated successfully')
            ->send();
        $this->isOpen = false;
        $this->emit('refreshTable');
    }
    public function render()
    {
        return view('livewire.process.edit-room');
    }
}
