<?php

namespace App\Http\Livewire\Item;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewItemForm extends Component
{

    public $categories =[];
    public $name;
    public $category_id;
    public $erp_code;
    public $remark;
    public $thumbnail;
    public $editItemId;
    public $editItem;

    use WithFileUploads;

    protected $rules = [
             'name' => "required|unique:items,name",
             'thumbnail'=>'image|max:1024',
             'category_id' => 'required',
             'erp_code' => 'required|unique:items,erp_code',
             'remark' =>''

    ];


    // public function formReset()
    // {
    //     $this->reset(['name', 'category_id','erp_code']);
    // }


    public function formSubmit()
    {
        // $this->resetValidation();

        $validatedData = $this->validate();

        $path = Storage::disk('public')->putFileAs('itemThumbnails', $this->thumbnail, $this->erp_code. '.'. $this->thumbnail->guessExtension() );

        $data = [
            'name' => $validatedData['name'],
            'category_id' => $validatedData['category_id'],
            'erp_code' => $validatedData['erp_code'],
            'remark' => $validatedData['remark'],
            'thumbnail' => $path
        ];

        $result = Item::create($data);

        // if(!$result) {
        //     $this->addError('sql', 'SQL ERROR!!!');
        // }

        // $this->resetErrorBag();
        // $this->formReset();

        // if($result->category_id !== "1") {
        //     BatchNumber::create([
        //         'item_id' => $result->id,
        //         'batch_number' => 'NA',
        //         'expiry_date' => '2025-12-31',
        //         'initial_qty' => 0,
        //         'status' => 'active',
        //         'barcode' => ''
        //     ]);
        // }

        // dump($result);

        session()->flash('created', 'New Item has been created!');
        $this->resetExcept('categories');
        // return redirect()->route('items.show', ['item' => $result->id]);

    }


    public function editItem()
    {

        // $this->validate();
        // $this->validate([
        //     'name' => Rule::unique('items', 'name')->ignore($this->editItemId),
        //     // 'erp_code' => Rule::unique('items', 'erp_code')->ignore($this->editItemId),
        //     'erp_code' => 'required',
        // ]);


        // $validatedData = [
        //     'name' => $this->name,
        //     'category_id' => $this->category_id,
        //     'erp_code' => $this->erp_code,
        //     'thumbnail' => $this->thumbnail

        // ];


        // $result =Item::where('id', $this->editItemId)
        //         ->update($validatedData);

        // if(!$result) {
        //     $this->addError('sql', 'SQL ERROR!!!');
        // }



                // dd($result);

                // session()->flash('created', 'Item has been updated');
                return redirect()->route('items.show', ['item'=>$this->editItemId]);

    }


    public function mount($item)
    {


        $this->categories= Category::get();

        if($item !== null) {
            $this->editItemId= $item->id;
            $this->name = $item->name;
            $this->erp_code= $item->erp_code;
            $this->category_id= $item->category_id;
            $this->remark= $item->remark;
            $this->thumbnail = $item->thumbnail;

        }


    }


    public function render()
    {
        return view('livewire.item.new-item-form');
    }
}
