<?php

namespace App\Livewire\Item;

use App\Models\BatchNumber;
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

    protected $listeners = ['batchModalCloseRequest', 'batchUpdateRequestData'];

    public function batchModalCloseRequest()
    {
        $this->resetExcept('item_id');
        $this->resetErrorBag();
    }


    protected $rules = [
        'item_id' => 'required',
        'batch_number' => 'required|unique:App\Models\BatchNumber,batch_number',
        'expiry_date' => 'required|date|after:tomorrow',
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
    }

    public function batchUpdateRequest()
    {

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
