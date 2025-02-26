<?php

namespace App\Livewire\Item;

use App\Models\BatchNumber;
use Illuminate\Validation\Rule;
use Livewire\Component;

class NewItemBatchForm extends Component
{
    public $item_id;
    public $batch_number;
    public $expiry_date;
    public $initial_qty;
    public $status;
    public $bar_code;
    public $createMode = true;
    public $lineId = 298;

    protected $listeners = ['batchModalCloseRequest', 'batchUpdateRequestData'];

    public function batchModalCloseRequest()
    {
        $this->resetExcept('item_id');
        $this->resetErrorBag();
    }


    protected $rules = [
        'item_id' => 'required',
        'batch_number' =>'required|unique:App\Models\BatchNumber,batch_number,$lineId',
        'expiry_date' => 'required',
        'initial_qty' => 'required|gt:0',
        'status' => 'required'
    ];

    public function updatedExpiryDate()
    {

        $this->validateOnly('expiry_date');
    }


    public function batchUpdateRequestData($batch)
    {
        $this->batch_number = $batch['batch_number'];
        $this->expiry_date = $batch['expiry_date'];
        $this->initial_qty = $batch['initial_qty'];
        $this->status = $batch['status'];
        $this->createMode = false;
        $this->lineId = $batch['id'];

    }

    public function batchUpdateRequest()
    {

        $this->validate();
        BatchNumber::find($this->lineId)->update(
            [
                'batch_number' => $this->batch_number,
                'expiry_date' => $this->expiry_date,
                'status' => $this->status,
                'initial_qty' => $this->initial_qty,

            ]
            );

            session()->flash('created', 'Batch Number has been updated');
            $this->resetExcept('item_id');
    }

    public function submitForm()
    {
       $validated = $this->validate();

       BatchNumber::create($validated);

       session()->flash('created', 'Batch Number has been added');
       $this->resetExcept('item_id');
    }

    public function render()
    {
        return view('livewire.item.new-item-batch-form');
    }
}
