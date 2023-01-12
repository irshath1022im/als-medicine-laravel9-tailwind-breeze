<?php

namespace App\Http\Livewire\Item;

use App\Models\BatchNumber;
use App\Models\Item;
use App\Models\Receiving;
use App\Models\ReceivingItem;
use Livewire\Component;
use Livewire\WithPagination;

class ItemShow extends Component
{
    use WithPagination;

    public  $item_id = 1;
    public  $selectedBtn;
    public $activeBtn = "batches";

    public $receivings = [];



    public function updatedActiveBtn()
    {
        $this->selectedBtn = $this->activeBtn;

        if($this->activeBtn == "batches")
        {
            $this->batches = BatchNumber::where('item_id', $this->item_id)
                                    ->get();
        }

        if($this->activeBtn == "receivings")
        {
            $this->receivings = ReceivingItem::where('item_id', $this->item_id)
                                    ->get();
        }

    }




    public function render()
    {
        $result = BatchNumber::paginate(2);
        return view('livewire.item.item-show',['batches' => $result]);
    }
}
