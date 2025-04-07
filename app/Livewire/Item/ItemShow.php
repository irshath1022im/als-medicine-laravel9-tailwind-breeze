<?php

namespace App\Livewire\Item;

use App\Models\BatchNumber;
use App\Models\Item;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ItemShow extends Component
{
    use WithPagination;

    public $item_id;
    public $item;
    public $name;
    public $openReceivingModal = false;
    public $openBatchModal = false;
    public $selectedBtn;
    public $activeBtn = "batches";
    public $selectedBatchId=1;
    public $deleteBatch;



    public function openReceivingModalRequest($batch_id)
    {
        $this->openReceivingModal = true;
        $this->dispatch('getReceivingDetails', $batch_id);
    }


    public function closeReceivingPanels()
    {
        $this->openReceivingModal = false;
        $this->dispatch('closeReceivingDetails');
    }

    public function batchModalCloseRequest()
    {
        $this->openBatchModal = false;

        $this->dispatch('batchModalCloseRequest');
    }


    public function batchUpdateRequest($batch)
    {
        $this->openBatchModal = true;
        $this->dispatch('batchUpdateRequestData', $batch);
    }


    public function mount($item_id)
    {
        $this->item = Item::find($item_id);

    }

    public function render()
    {
        $result = BatchNumber::where('item_id', $this->item_id)
                    // ->with('receiving_items', function($q){
                    //     return $q->withSum('qty');
                    // })
                    ->with('receiving_items')
                    ->get();
        return view('livewire.item.item-show',['batches' => $result])
            ->extends('components.layouts.app')
        ;
    }




}
