<?php

namespace App\Http\Livewire\App;

use Livewire\Component;

class Dialog extends Component
{
    public $show = false;
    public function populateData()
    {

    }
    public function render()
    {
        return view('livewire.app.dialog');
    }
}
