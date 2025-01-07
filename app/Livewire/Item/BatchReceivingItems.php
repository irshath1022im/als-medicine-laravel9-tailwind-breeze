<?php

namespace App\Http\Livewire\Item;

use App\Models\ReceivingItem;
use Livewire\Component;
use Livewire\WithPagination;

class BatchReceivingItems extends Component
{

    use WithPagination;

    public $batch_id;

    protected $listeners=['getReceivingDetails', 'closeReceivingDetails'];

    public function getReceivingDetails($batch_id)
    {
        $this->batch_id = $batch_id;
    }

    public function closeReceivingDetails()
    {
        $this->resetPage();
    }

    public function render()
    {
        $result = ReceivingItem::where('batch_number_id', $this->batch_id)
                                ->with('receiving','batch_number')
                                ->paginate(1);

        return view('livewire.item.batch-receiving-items', ['receiving_items' => $result]);
    }
}
