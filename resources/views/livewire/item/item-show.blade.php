<div
    x-cloak
    x-data="{
            openReceivingModal : @entangle('openReceivingModal'),
            openConsumptionModal : false,
            openBatchModal: @entangle('openBatchModal'),
            newConsumptionModal : @entangle('newConsumeModal')
            }"

>



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
                            <div class="flex p-2 border mb-1 uppercase" >

                                <div class=" basis-3/4 flex items-center   justify-between border" >

                                    <div class=" basis-1/5" wire:click ="batchUpdateRequest({{ $batch }})">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentcolor" class="w-6 h-6">
                                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                            <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                          </svg>
                                    </div>

                                    <div>{{ $batch->id }}</div>

                                    <div class=" px-2 basis-1/5 uppercase text-sm">
                                        {{ $batch->batch_number }}
                                    </div>

                                    <div class=" basis-4/5 flex justify-end">

                                        <x-button class="btn btn-delete bg-red-600 hover:bg-orange-200"
                                            wire:confirm="Do you want remove?"
                                            wire:click="removeBadch({{ $batch }})"
                                        >Delete</x-button>
                                        <x-button>Expire :  <span>{{ $batch->expiry_date}}</span></x-button>
                                        <x-button class=" ml-1 {{ $batch->expiry_date > Carbon\Carbon::now() ? 'bg-green-400' : 'bg-red-400'}}">
                                            Days :
                                            {{ $batch->expiry_date < Carbon\Carbon::now() ? '-' : ''}}
                                           {{ Carbon\Carbon::parse($batch->expiry_date)->diffInDays()}} <span></span>
                                        </x-button>

                                    </div>

                                </div>

                                <div class="flex basis-1/4  m-1 p-2 justify-end">
                                    {{-- <x-button class="mx-1 bg-orange-200 text-black hover:text-white"
                                        wire:click="openReceivingModalRequest({{ $batch->id }})"
                                    >Receivings</x-button> --}}

                                    <button
                                        class="btn btn-info bg-orange-300 text-black hover:text-white"
                                        wire:click="addConsumption({{ $batch }})"
                                        >
                                     CONSUME
                                    <button>

                                    <x-button
                                        class="bg-orange-300 text-black hover:text-white"
                                        x-on:click="openConsumptionModal = true">
                                        logs
                                    </x-button>



                                </div>

                            </div>

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



    {{-- Consumption Modal --}}

        <div class="modal"
            x-show="newConsumptionModal"
        >

            <div class="modal-overlay">

            </div>

                <div class="modal-body">
                    <div class="modal-content">

                        <div>
                            <button class="btn btn-info"
                                x-on:click=" newConsumptionModal = false" >close</button>
                        </div>

                       @livewire('consumption.new-consumption-form')

                    </div>
                </div>

        </div>












</div>
