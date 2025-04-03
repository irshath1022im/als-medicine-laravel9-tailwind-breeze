<?php

namespace App\Livewire\Item;

use App\Livewire\Consumption\NewConsumptionForm;
use App\Models\BatchNumber;
use App\Models\Consumption;
use App\Models\Item;
use App\Models\Receiving;
use App\Models\ReceivingItem;
use Livewire\Component;
use Livewire\WithPagination;

class ItemShow extends Component
{
    use WithPagination;

    public $item_id = 1;
    public $item;
    public $name;
    public $openReceivingModal = false;
    public $openBatchModal = false;
    public $selectedBtn;
    public $activeBtn = "batches";
    public $selectedBatchId=1;
    public $deleteBatch;
    public $newConsumeModal = false;


    public $receivings = [];



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


    //     if(count(  $this->item->batch['receiving_items']) >= 1){

    //     }

    //     $totalReceiving = ReceivingItem::where('batch_number_id', $this->batch_number_id)->sum('qty');

    // //total sonsumptions

    //     $totalConsumption = Consumption::where('batch_number_id', $this->batch_number_id)->sum('qty');

    //     $this->availableQty = $initialQty+$totalReceiving-$totalConsumption;



    }


    public function removeBadch($batch)
    {
        $this->deleteBatch = $batch['id'];
        BatchNumber::find($this->deleteBatch)->delete($this->deleteBatch);
    }


    public function addConsumption($item, $batch)
    {

        // dd($item, $batch);
        $this->newConsumeModal = true;
        $this->dispatch('newConsumeRequest', $item, $batch)->to(NewConsumptionForm::class);

    }



    public function render()
    {
        $result = BatchNumber::where('item_id', $this->item_id)
                    // ->with('receiving_items', function($q){
                    //     return $q->withSum('qty');
                    // })
                    ->with('receiving_items')
                    ->withSum('receiving_items', 'qty')
                    ->get();
        return view('livewire.item.item-show',['batches' => $result])
            ->extends('components.layouts.app')
        ;
    }




}
