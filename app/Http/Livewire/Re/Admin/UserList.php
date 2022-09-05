<?php

namespace App\Http\Livewire\Re\Admin;

use Livewire\Component;
use App\Models\User;
class UserList extends Component
{
    public $search='',$filter='all';
    protected $listeners = ['refreshTable'=>'$refresh'];
    public $roles=[];
    public function render()
    {
        return view('livewire.re.admin.user-list',[
            'users'=>User::query()
                    ->when($this->search!='',function($query){
                        $query->where('name','like','%'.$this->search.'%')
                            ->orWhere('email','like','%'.$this->search.'%');
                    })
                    ->when($this->filter!='all',function($query){
                        $query->where('role_id',$this->filter);
                    })
                    ->paginate(10)
        ]);
    }
}
