<?php

namespace App\Http\Livewire\Re\Admin;

use App\Models\Rate;
use Livewire\Component;
use Livewire\WithPagination;

class RateList extends Component
{
    use WithPagination;
    protected $listeners = [
        'refreshTable' => '$refresh',
    ];
    public function render()
    {
        return view('livewire.re.admin.rate-list',[
            'rates'=>Rate::query()
                    ->with('staying_hour','type')
                    ->paginate(10)
        ]);
    }
}
