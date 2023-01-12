<div
    x-data="{openReceivingModal : false}"
>
     {{-- ITEM CARD --}}

     <section class="border md:flex">

        <div class="border p-2 m-2 md:basis-1/3  ">
            <img src="{{ asset('images/medicine.jpg') }}" />
        </div>

        {{-- details --}}

        <div x-data="{activeBtn : @entangle('activeBtn')}" class=" md:basis-3/4 p-2 m-2 border">

                        @foreach ($batches as $batch)
                            <div class="flex p-2 border mb-1 uppercase" >

                                <span class=" basis-1/4 m-1 p-2">{{ $batch->batch_number }}</span>
                                <div class="flex basis-3/4  m-1 p-2 justify-end">
                                    <x-button class="mx-1 bg-orange-200 text-black hover:text-white"
                                        x-on:click="openReceivingModal = true"
                                    >Receivings</x-button>
                                    <x-button class="bg-orange-300 text-black hover:text-white" >Consumptions</x-button>
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

                <table class="w-full">
                    <thead class="uppercase bord">
                        <th class="p-2 border ">LINE #</th>
                        <th class="p-2 border ">DATE</th>
                        <th class="p-2 border ">BATCH NUMBER</th>
                        <th class="p-2 border ">qty #</th>
                        <th class="p-2 border ">unit price #</th>
                        <th class="p-2 border ">cost</th>
                    </thead>

                    <tbody>

                        @foreach ($batches as $item)

                        <tr class="">
                            <td class="p-2 border ">{{ $item->id }}</td>
                            <td class="p-2 border ">2022-00-205</td>
                            <td class="p-2 border ">458ere</td>
                            <td class="p-2 border ">10</td>
                            <td class="p-2 border ">20.50</td>
                            <td class="p-2 border ">75</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>

                <div>
                    {{ $batches->links() }}
                </div>

                <div class="text-end mt-2">
                    <x-button x-on:click="openReceivingModal = false">Close</x-button>
                </div>
            </div>



          </div>


    </div>
    {{-- Receiving MOdal End --}}


</div>
