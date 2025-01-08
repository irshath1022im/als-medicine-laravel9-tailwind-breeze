<?php

namespace App\Livewire\Item;

use Livewire\Component;

class NewItemBatchForm extends Component
{
    public $item_id;
    public $batch_number;
    public $expiry_date;
    public $initial_qty;
    public $status;
    public $bar_code;


    protected $rules =[
        'batch_number' => 'required'
    ];

    public function submitForm()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.item.new-item-batch-form');
    }
}
