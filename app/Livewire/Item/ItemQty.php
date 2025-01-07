<?php

namespace App\Http\Livewire\Item;

use App\Models\BatchNumber;
use App\Models\Item;
use Livewire\Component;

class ItemQty extends Component
{

    public $itemQty;
    public $batchNumberInitialQty;

    public function mount($item_id)
    {

      $result = Item::with('batch_numbers')
                    ->find($item_id);

                $batchCollection = $result->batch_numbers;

              $this->batchNumberInitialQty =  $batchCollection->sum('initial_qty');
    }

    public function render()
    {
        return view('livewire.item.item-qty');
    }
}
