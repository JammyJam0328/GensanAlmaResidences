<?php

namespace App\Http\Livewire\Tables;

use App\Models\Rate;
use Livewire\Component;
use Livewire\WithPagination;
class Rates extends Component
{
    use WithPagination;
    protected $listeners = [
        'refreshTable' => '$refresh',
    ];
    public function render()
    {
        return view('livewire.tables.rates',[
            'rates'=>Rate::query()
                    ->with('staying_hour','type')
                    ->paginate(10)
        ]);
    }
}
