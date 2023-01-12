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
    public $name;
    public $openReceivingModal = false;
    public  $selectedBtn;
    public $activeBtn = "batches";
    public $selectedBatchId=1;

    public $receivings = [];



    public function openReceivingModalRequest($batch_id)
    {
        $this->openReceivingModal = true;
        $this->emit('getReceivingDetails', $batch_id);
    }

    public function closeReceivingPanels()
    {
        $this->openReceivingModal = false;
        $this->emit('closeReceivingDetails');
    }



    public function mount($item)
    {
        $this->item_id = $item->id;
        $this->name = $item->name;
    }



    public function render()
    {
        $result = BatchNumber::where('item_id', $this->item_id)->get();
        return view('livewire.item.item-show',['batches' => $result]);
    }
}
