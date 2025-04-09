<?php

namespace App\Livewire\Consumption;

use App\Livewire\Item\BatchCardForItemPage;
use App\Livewire\Item\ItemShow;
use App\Models\BatchNumber;
use App\Models\Consumption;
use App\Models\ReceivingItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NewConsumptionForm extends Component
{

    public $expiry_date;

    #[Validate('required')]
    public $date;
    public $location_id=1;
    public $item_id;
    public $batch_number_id;
    public $batch_number;

    #[Validate('required')]
    public $qty;
    public $user_id;
    public $erp_code;
    public $item_name;
    public $availableQty;


    //old type listerenes
    // protected $listeners = ['newConsumeRequest'];

    #[On('newConsumeRequest')]

    public function newConsumeRequest($item, $batch)
    {
        // dd($batch);
        $this->item_id = $item['id'];
        $this->item_name = $item['name'];
        $this->erp_code = $item['erp_code'];
        $this->batch_number_id = $batch['id'];
        $this->batch_number = $batch['batch_number'];
        $this->expiry_date = $batch['expiry_date'];

        // initial qty of badge number

        $initialQty = $batch['initial_qty'];


            $totalReceiving = ReceivingItem::where('batch_number_id', $this->batch_number_id)->sum('qty');

        //total sonsumptions

            $totalConsumption = Consumption::where('batch_number_id', $this->batch_number_id)->sum('qty');

            $this->availableQty = $initialQty+$totalReceiving-$totalConsumption;
    }

    public function updatedQty()
    {
        $validatedQty = $this->validate(
            ['qty' => 'required|integer|min:1|lte:'.$this->availableQty.''],
            $messages = [
                'qty.lte:'.$this->availableQty.'' => 'QTY is should be more then avaialble QTY.']
        );

    }


    #[On('closeNewConsumeForm')]

    public function closeNewConsumeForm()
    {
       $this->resetErrorBag();
       $this->reset(['date', 'qty']);

    }

    public function newConsumeSubmit()
        {

            $this->validate();

            $validatedQty = $this->validate(
                ['qty' => 'required|integer|min:1|lte:'.$this->availableQty.''],
                $messages = [
                    'qty.lte:'.$this->availableQty.'' => 'QTY is should be more then avaialble QTY.']
            );


            $data = [
                'date' => $this->date,
                'location_id' => $this->location_id,
                'item_id' => $this->item_id,
                'batch_number_id'=> $this->batch_number_id,
                'qty' => $this->qty,
                'user_id' => 1
            ];

            Consumption::create($data);

            session()->flash('created', 'New Consumptin is added');
            $this->resetErrorBag();
            $this->reset(['date', 'qty']);



        }

    public function render()
    {
        return view('livewire.consumption.new-consumption-form');
    }



}



