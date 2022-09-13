<?php

namespace App\Http\Livewire\Re\Admin;

use App\Models\{Room};
use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\{CheckboxList, TextInput, Grid, Select, Textarea};
use WireUi\Traits\Actions;

class EditRoom extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms, Actions;
    public $number, $description, $floor_id, $room_status_id;
    public $floors = [], $roomStatuses = [], $types = [];
    public $type_id;
    protected $listeners = ['editRoom'];
    public $room;
    public $modalOpen = false;
    public function editRoom($id)
    {
        $this->room = Room::find($id);
        $this->number = $this->room->number;
        $this->description = $this->room->description;
        $this->floor_id = $this->room->floor_id;
        $this->room_status_id = $this->room->room_status_id;
        $this->type_id = $this->room->type_id;
        $this->modalOpen = true;
    }
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
            Select::make('type_id')
                        ->label('Type')
                        ->required()
                        ->validationAttribute('Type')
                       ->options($this->types)
        ];
    }

    public function update()
    {
        $this->validate();
        $this->room->update([
            'number' => $this->number,
            'description' => $this->description,
            'floor_id' => $this->floor_id,
            'room_status_id' => $this->room_status_id,
            'type_id' => $this->type_id,
        ]);
        $this->reset('number', 'description', 'floor_id', 'room_status_id');
        $this->notification()->success(
            $title='Room Updated',
            $description='Room has been updated successfully'
        );
        $this->modalOpen = false;
        $this->emit('refreshTable');
    }
    public function render()
    {
        return view('livewire.re.admin.edit-room');
    }
}
