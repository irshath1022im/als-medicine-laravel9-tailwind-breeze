<?php

namespace App\Http\Livewire\Item;

use Livewire\Component;

class ItemShow extends Component
{

    public  $item;

    public function mount($item)
    {
        $this->item = $item;
    }

    public function render()
    {
        return view('livewire.item.item-show');
    }
}
