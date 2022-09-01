<?php

namespace App\Http\Livewire\Tables;

use App\Models\User;
use Filament\Tables;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Livewire\WithPagination;

class UsersList extends Component 
{
    use WithPagination; 
    public $search='';
    protected $listeners = [
        'refreshTable' => '$refresh',
    ];
    public function render()
    {
        return view('livewire.tables.users-list',[
            'users'=>User::with('role')->paginate(10)
        ]);
    }
}
