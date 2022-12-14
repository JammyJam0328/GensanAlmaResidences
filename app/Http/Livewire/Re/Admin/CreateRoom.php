<?php

namespace App\Http\Livewire\Re\Admin;

use App\Models\{Floor, Rate, Room, RoomStatus, Type, RoomType};
use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\{CheckboxList, TextInput, Grid, Select, Textarea};
use WireUi\Traits\Actions;
class CreateRoom extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms, Actions;
    public $number, $description, $floor_id, $room_status_id;
    public $floors = [], $roomStatuses = [],$types=[];
    public $type_id;
    public $modalOpen=false;
    protected $listeners = ['createRoom'];
    public function createRoom()
    {
        $this->modalOpen=true;
    }
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
                        ->unique('rooms', 'number')
                        ->type('number')
                        ->placeholder('ex. 1')
                        ->minValue(1),
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
            Select::make('type_id')
                        ->label('Type')
                        ->required()
                        ->validationAttribute('Type')
                       ->options($this->types)
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
            'type_id' => $this->type_id,
        ]);
        $this->reset('number', 'description', 'floor_id', 'room_status_id', 'type_id');
        $this->notification()->success(
            $title = 'Room Created',
            $description = 'Room has been created successfully.'
        );
        $this->emit('refreshTable');
        $this->modalOpen=false;
    }
    public function render()
    {
        return view('livewire.re.admin.create-room');
    }
}
