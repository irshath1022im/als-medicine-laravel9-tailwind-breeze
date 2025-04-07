<div
    class="md:text-sm"
    x-cloak
    x-data="{
            openReceivingModal : @entangle('openReceivingModal'),
            openConsumptionModal : false,
            openBatchModal: @entangle('openBatchModal'),
           }"

>


{{-- @dump($item); --}}

        {{-- menu bar --}}
        <div class="p-2 border flex justify-end">
            <x-button x-on:click="openBatchModal = true">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
              </span>
              NEW BADGE</x-button>

              <button class="btn btn-blue">

              NEW RECEIVING</button>
        </div>



     {{-- ITEM CARD --}}

     <section class="md:flex mt-2">

        <div class="card md:basis-1/3">
            <div class="card-header flex justify-between">
                <div class="card-heading">{{ $item->name }}</div>
                <div>
                   <x-buttons.infobtn message="{{ $item->erp_code }}" />
                </div>
            </div>

            <div class="card-body">
                <img src="{{ asset('images/medicine.jpg') }}" />
            </div>
        </div>



        {{-- details --}}

        <div
            x-data="{
                activeBtn : @entangle('activeBtn')
                }"
             class=" md:basis-3/4 p-2 ml-1 border">

                        @foreach ($batches as $batch)

                           @livewire('item.batch-card-for-item-page', ['batch' => $batch , 'item' => $item])

                        @endforeach

        </div>

    </section>

    {{-- Receiving Modal --}}

    <div class="fixed inset-0 z-10 overflow-y-auto"
        x-show="openReceivingModal"
    >
          {{-- Overlay --}}
          <div
            x-transition.opacity
            class="fixed inset-0 bg-black  opacity-50">
        </div>

    <!-- Panel -->

          <div  class="relative flex justify-center top-16 w-full">

            <div class="relative">

                <button
                    {{-- wire:click="closeItemBatchModal" --}}
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute top-0 right-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                </button>
            </div>

            <div class=" relative bg-white w-full max-w-4xl rounded-xl p-12 shadow-lg overflow-y-auto">

                    {{-- @livewire('item.batch-receiving-items') --}}

                <div class="text-end mt-5">
                    <x-button wire:click="closeReceivingPanels">Close</x-button>
                </div>

            </div>



          </div>


    </div>
    {{-- Receiving MOdal End --}}


    {{-- Consumption Modal --}}

    <div class="fixed inset-0 z-10 overflow-y-auto"
        x-show="openConsumptionModal"
    >

    {{-- overall --}}

        <div class="fixed inset-0 bg-black h-screen opacity-50"></div>


        {{-- Modal Panel --}}
        <div class="relative flex justify-center top-16">

            <div class="bg-white w-full max-w-4xl rounded-xl p-12 shadow-lg overflow-y-auto">

                <table class="w-full">
                    <thead class="uppercase bord">
                        <th class="p-2 border ">LINE #</th>
                        <th class="p-2 border ">DATE</th>
                        <th class="p-2 border ">Batch Number</th>
                        <th class="p-2 border ">qty #</th>
                        <th class="p-2 border ">location/th>
                    </thead>

                    <tbody>

                        @foreach ($batches as $item)

                        <tr class="">
                            <td class="p-2 border ">{{ $item->id }}</td>
                            <td class="p-2 border ">2022-00-205</td>
                            <td class="p-2 border ">458ere</td>
                            <td class="p-2 border ">10</td>
                            <td class="p-2 border ">location</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>

                <div class="mt-5">
                    {{-- {{ $batches->links() }} --}}
                </div>

                <div class="text-end mt-5">
                    <x-button x-on:click="openConsumptionModal = false">Close</x-button>
                </div>
            </div>

        </div>

    </div>

     {{-- Batch Modal --}}

     <div class="fixed inset-0 z-10 overflow-y-auto"
        x-show="openBatchModal"
    >

    {{-- overall --}}

     <div class="fixed inset-0 bg-black h-screen opacity-50"></div>


     {{-- Modal Panel --}}
     <div class="relative flex justify-center top-16">

         <div class="bg-white w-full max-w-4xl rounded-xl p-12 shadow-lg overflow-y-auto">

            @livewire('item.new-item-batch-form', ['item_id' => $item_id])

             <div class="text-end mt-5">
                 <x-button
                    wire:click="batchModalCloseRequest">Close</x-button>
             </div>


         </div>

     </div>

    </div>
















</div>
