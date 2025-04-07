<?php

namespace App\Livewire\Item;

use App\Livewire\Consumption\NewConsumptionForm;
use App\Models\BatchNumber;
use Livewire\Attributes\On;
use Livewire\Component;

class BatchCardForItemPage extends Component
{

    public $batch;
    public $item;
    public $newConsumeModal = false;


    public function removeBatch($lineId)
    {
        BatchNumber::find($lineId)->delete();
    }

    public function addConsumption()
    {
        // dd($item, $batch);
        $this->newConsumeModal = true;
        $this->dispatch('newConsumeRequest', $this->item, $this->batch)->to(NewConsumptionForm::class);

    }

    public function closeConsumptionModalRequest()
    {
        $this->newConsumeModal = false;
        $this->dispatch('closeNewConsumeForm')->to(NewConsumptionForm::class);
    }




    public function render()
    {
        return view('livewire.item.batch-card-for-item-page');
    }


}
