<?php

namespace App\Http\Livewire\Item;

use App\Models\BatchNumber;
use Livewire\Component;

class ItemBatches extends Component
{

    public $item_id = null;
    Public $filteredBy = null;

    protected $listeners = ['getBatchDetails'];


    public function getBatchDetails($item_id)
    {
        $this->item_id = $item_id;
    }

    public function render()
    {

        $results = BatchNumber::where('item_id', $this->item_id)
                                ->with('receiving_items','consumptions')
                                ->when($this->filteredBy, function($query){
                                    return $query->where('status', $this->filteredBy);
                                })
                                ->get();
        return view('livewire.item.item-batches', ['batches' => $results]);
    }
}
