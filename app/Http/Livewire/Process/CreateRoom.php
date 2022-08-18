<?php

namespace App\Http\Livewire\Process;

use App\Models\{Floor, Rate, Room, RoomStatus, Type, RoomType};
use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\{CheckboxList, TextInput, Grid, Select, Textarea};
use Filament\Notifications\Notification;

class CreateRoom extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public $number, $description, $floor_id, $room_status_id;
    public $floors = [], $roomStatuses = [],$types=[];
    public $selected_types=[];
    protected function getFormSchema(): array
    {
        return [
            Grid::make(3)
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
                ->placeholder('Leave it blank if none')
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
    public function save()
    {
        $this->validate();
        $room = Room::create([
            'number' => $this->number,
            'description' => $this->description,
            'floor_id' => $this->floor_id,
            'room_status_id' => $this->room_status_id,
        ]);
        foreach ($this->selected_types as $type) {
            RoomType::create([
                'room_id' => $room->id,
                'type_id' => $type,
            ]);
        }
        $this->reset('number', 'description', 'floor_id', 'room_status_id', 'selected_types');
        Notification::make()
            ->success()
            ->title('Success')
            ->body('Room has been created successfully')
            ->send();
        $this->emit('refreshTable');
    }
    public function render()
    {
        return view('livewire.process.create-room');
    }
}
