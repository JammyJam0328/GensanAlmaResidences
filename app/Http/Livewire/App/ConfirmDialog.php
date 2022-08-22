<?php

namespace App\Http\Livewire\App;

use Livewire\Component;

class ConfirmDialog extends Component
{
    // properties
    public $title;
    public $description;
    public $color;
    public $isOpen = false;
    public $confirmMethod;
    public $cancelMethod;
    public $confirmButtonText;
    public $cancelButtonText;
    // 
    protected $listeners = ['confirm'=>'setOpen'];
    //
    public function setOpen($details=[])
    {
        $this->title = $details['title']??'Confirm';
        $this->description = $details['description']??'Are you sure you want to do this?';
        $this->color = $details['color']??'primary';
        $this->confirmMethod = $details['confirmMethod'];
        $this->cancelMethod = $details['cancelMethod']??null;
        $this->confirmButtonText = $details['confirmButtonText']??'Confirm';
        $this->cancelButtonText = $details['cancelButtonText']??"Cancel";
        $this->isOpen = true;
    }
    public function confirm()
    {
        $this->emit($this->confirmMethod);
        $this->isOpen=false;
    }
    public function cancel()
    {
        $this->emit($this->cancelMethod);
        $this->isOpen=false;
    }
    public function render()
    {
        return view('livewire.app.confirm-dialog');
    }
}
