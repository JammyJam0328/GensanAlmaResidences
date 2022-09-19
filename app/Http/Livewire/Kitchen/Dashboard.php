<?php

namespace App\Http\Livewire\Kitchen;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
use App\Models\FoodCategory;
use App\Models\Food;

 
class Dashboard extends Component implements Tables\Contracts\HasTable 
{
    use Tables\Concerns\InteractsWithTable;


    protected function getTableQuery(): Builder 
    {
        return Transaction::query()->where('transaction_type_id', 3)->with('orders');
    } 

    protected function getTableColumns(): array 
    {
        return [ 
            Tables\Columns\TextColumn::make('guest.name')->searchable(),
            Tables\Columns\TextColumn::make('payable_amount')->label('Total Amount'),
        ];
    }

    public function render()
    {
        return view('livewire.kitchen.dashboard');
    }
}
