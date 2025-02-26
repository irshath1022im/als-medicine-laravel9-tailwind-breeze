<div
    x-data="{modalShow : @entangle('showItemBatchModal')}"
    x-cloak
>

{{-- @dump($items) --}}
    <div class="container mx-auto pt-10 px-10  relative">

        <input type="text" placeholder="Search Item" class="form-controll relative" wire:model.live="searchValue">


        @if ($searchValue)

            <div class="absolute pt-10 px-10 top-5 right-5"
                wire:click="resetSearch()">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-gray-500  ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
            </div>

        @endif

    </div>

    {{-- <div class="container  mx-auto p-5 text-center" wire:loading >
        <x-spinner></x-spinner>

        </div> --}}



    <div class="flex justify-between flex-wrap container mx-auto px-10 " >

            @foreach ($items as $item)

                <div class="card w-72 p-2 my-2 shadow-lg">

                    <div class="card-header h-20 border my-auto">
                        <div class="card-heading">
                          <a href="{{ route('itemShow', ['item_id' => $item->id]) }}" >
                            <button class="btn btn-info">{{ $item->erp_code }}</button> {{ $item->name }}
                          </a>
                        </div>
                    </div>

                    <div class="card-img my-3">
                        <img src="{{ asset('images/medicine.jpg') }}" />
                    </div>

                    <div class="card-footer ">

                        <div>

                            @if ($item->batch_numbers_count > 0)

                                @if ( $item->batch_numbers->sum('initial_qty') + $item->receiving_items_batch_number->sum('qty') -
                                ( count($item->consumptions) > 0 ?  $item->consumptions->sum('qty') : 0 ) > 0 )

                                    <button class="btn bg-green-200"
                                    wire:click="openItemBatchModal({{ $item->id }})">


                                    InStore: {{
                                        $item->batch_numbers->sum('initial_qty') + $item->receiving_items_batch_number->sum('qty') -
                                    ( count($item->consumptions) > 0 ?  $item->consumptions->sum('qty') : 0 ) }}
                                    </button>


                            @else
                                <button class="btn  bg-red-300"
                                wire:click="openItemBatchModal({{ $item->id }})"
                                >
                                    Out Of Stock
                                </button>

                            @endif

                            @else

                                <button class="btn bg-blue-200">
                                    No Badges Found
                                </button>

                            @endif

                        </div>



                    </div>


                </div>
            @endforeach


    </div>



    <div class="container mx-auto px-10">
        {{ $items->links() }}
    </div>


    {{-- MOdal For Badches --}}
    <div class="fixed inset-0 z-10 overflow-y-auto"
        x-show="modalShow">



        <div
            x-transition.opacity
            class="fixed inset-0 bg-black bg-opacity-50">

        </div>



            <div  class="relative flex min-h-screen items-center justify-center p-2">

                <div class="relative w-full max-w-4xl overflow-y-auto rounded-xl bg-white p-12 shadow-lg">

                    <div class="relative">

                        <button class="btn"
                            wire:click="closeItemBatchModal()"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute top-0 right-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                        </button>
                    </div>

                    <div class="overflow-x-auto rounded-lg shadow">

                       {{-- <livewire:Item.item-batches /> --}}

                       @livewire('item.item-batches')

                     {{-- <livewire:item.item-batches /> --}}



                    </div>
                </div>

            </div>

        </div>













</div>
