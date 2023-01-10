<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemIndex extends Component
{

    public $searchValue="";
    public $showItemBatchModal = false;

    use WithPagination;

    public function updatedSearchValue()
    {
        $this->resetPage();
    }

    public function openItemBatchModal($item_id)
    {
        $this->showItemBatchModal = true;
        $this->emit('getBatchDetails', $item_id);
    }

    public function closeItemBatchModal()
    {
        $this->showItemBatchModal = false;
    }

    public function resetSearch()
    {
        $this->reset('searchValue');
        $this->resetPage();
    }

    public function render()
    {
        $result = Item::withCount('batch_numbers')
                        ->withCount('receiving_items_batch_number')
                        ->with(['batch_numbers' => function($query){
                             return $query->where('status','active')
                                    ->orWhere('status', 'stored')
                                    ->orWhere('status', 'closed')
                                    ->orWhere('status', '')
                                        ;
                                }
                                , 'consumptions','receiving_items_batch_number'
                                ])
                            ->where('name', 'like', '%'.$this->searchValue.'%')
                            ->paginate(10);

        return view('livewire.item.item-index',['items'=>$result]);
    }
}
