<?php
namespace App\Traits;
trait confirmDialog
{
    public $confirmMethod;
    public $cancelMethod;
    public function confirm($details=[])
    {
        $this->confirmMethod=$details['confirmMethod']??'';
        $this->cancelMethod=$details['cancelMethod']??'';
        $this->emit('confirm',$details);
    }
}