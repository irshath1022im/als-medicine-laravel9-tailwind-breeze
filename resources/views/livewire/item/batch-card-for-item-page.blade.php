<div class="flex p-2 border mb-1 uppercase"
    x-data="{
    newConsumptionModal : @entangle('newConsumeModal')
    }"

>

    <div class=" basis-3/4 flex items-center   justify-between border" >

        <div class=" basis-1/5" wire:click ="batchUpdateRequest({{ $batch }})">

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentcolor" class="w-6 h-6">
                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
              </svg>
        </div>

        {{-- <divs>{{ $batch->id }}</divs> --}}

        <div class=" px-2 basis-1/5 uppercase text-sm">
            {{ $batch->batch_number }}
        </div>

        <div class=" basis-4/5 flex justify-end">
{{--
            <x-button class="btn btn-delete bg-red-600 hover:bg-orange-200"
                wire:confirm="Do you want remove?"
                wire:click="removeBatch({{ $batch->id }})"
            >Delete</x-button> --}}

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
            {{-- wire:click="addConsumption( {{ $item }} , {{ $batch }})" --}}
            wire:click="addConsumption()"
            >
         CONSUME
        <button>

        <x-button
            class="bg-orange-300 text-black hover:text-white"
            x-on:click="openConsumptionModal = true">
            logs
        </x-button>

            <div class="w-8 cursor-pointer border rounded-sm ml-1 "
                wire:confirm wire:click="removeBatch({{ $batch->id }})"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-2 border border-red-700">
                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
              </svg>

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

                <div class="flex justify-end">

                    <button type="button" class="btn btn-close "
                            wire:click="closeConsumptionModalRequest()"
                    >Close</button>
                </div>

             </div>


         </div>

 </div>




</div>
