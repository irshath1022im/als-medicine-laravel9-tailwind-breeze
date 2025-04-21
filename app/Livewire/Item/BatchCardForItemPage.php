<?php

namespace App\Livewire\Item;

use App\Livewire\Consumption\NewConsumptionForm;
use App\Models\BatchNumber;
use App\Models\Consumption;
use App\Models\ReceivingItem;
use Livewire\Attributes\On;
use Livewire\Component;

class BatchCardForItemPage extends Component
{

    public $batch; //return the single batch from item-show
    public $item;
    public $newConsumeModal = false;
    public $availableQty;


    #[On('consumptionAdded')]

    public function consumptionAdded()
    {

    }


    public function mount()
    {



    }

    public function removeBatch($lineId)
    {
        BatchNumber::find($lineId)->delete();
    }

    public function addConsumption()
    {
        // dd($item, $batch);
        $this->newConsumeModal = true;
        $this->dispatch('newConsumeRequest', $this->item, $this->batch, $this->availableQty)->to(NewConsumptionForm::class);

    }

    public function closeConsumptionModalRequest()
    {
        $this->newConsumeModal = false;
        $this->dispatch('closeNewConsumeForm')->to(NewConsumptionForm::class);
    }





    public function render()
    {

        // initial qty of badge number
        $initialQty = $this->batch['initial_qty'];


        $totalReceiving = ReceivingItem::where('batch_number_id', $this->batch->id)->sum('qty');

    //total sonsumptions

        $totalConsumption = Consumption::where('batch_number_id', $this->batch->id)->sum('qty');

        $this->availableQty = $initialQty+$totalReceiving-$totalConsumption;

        return view('livewire.item.batch-card-for-item-page');
    }


}
