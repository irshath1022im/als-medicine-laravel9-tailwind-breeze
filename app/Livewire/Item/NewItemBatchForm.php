<?php

namespace App\Http\Livewire\Item;

use Livewire\Component;

class NewItemBatchForm extends Component
{
    public $item_id;

    public function render()
    {
        return view('livewire.item.new-item-batch-form');
    }
}
