<?php

namespace App\Http\Livewire\Tables;

use App\Models\Rate;
use Livewire\Component;
use Filament\Tables;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
class Rates extends Component 
{
    use WithPagination;
    protected $listeners = [
        'refreshTable' => '$refresh',
    ];
    // protected function getTableQuery(): Builder 
    // {
    //     return Rate::query()->with('staying_hour','type');
    // }
    // protected function getTableColumns(): array 
    // {
    //     return [
    //         TextColumn::make('staying_hour.number')->searchable(),
    //         TextColumn::make('amount')->searchable(),
    //         TextColumn::make('type.name')->searchable(),
    //      ];
    // }
    // protected function getTableActions(): array
    // {
    //     return [
    //         Action::make('edit') 
    //                 ->action( fn () => $this->emit('editRate'))
    //     ];
    // }
    // public function edit($id)
    // {
    //     $this->emit('edit', $id);
    // }
    public function render()
    {
        return view('livewire.tables.rates',[
            'rates'=>Rate::query()
                    ->with('staying_hour','type')
                    ->paginate(10)
        ]);
        
    }
}
