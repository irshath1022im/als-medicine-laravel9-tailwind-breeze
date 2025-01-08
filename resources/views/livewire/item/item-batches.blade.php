<div>

    <div wire:loading>
        <x-spinner></x-spinner>
    </div>

    <div class="flex">
        <button class="btn basis-">Item ID <span class="rounded-lg py-1 px-3 border-2 border-orange-600 " wire:loading.remove>{{ $item_id }}</span> </button>
        <select class="form-controll basis-3/4" type="select" wire:model.live="filteredBy">

                <option value="">All</option>
                <option value="active">Active</option>
                <option value="stored">Stored</option>
                <option value="closed">Closed</option>
        </select>
    </div>


    <table class="border-separate border  border-slate-400 w-full" >
        <thead class="">
            <th class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">LINE #</th>
            <th class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">BADGE</th>
            <th class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">EXPIRY DATE</th>
            <th class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">STATUS</th>
            <th class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">INITIAL QTY</th>
            <th class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">RECEIVING</th>
            <th class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">CONSUMPTIONS</th>
        </thead>

        <tbody class="divide-y divide-green-600" wire:loading.remove>

            @foreach ($batches as $item)

            <tr class="bg-gray-100 border-b uppercase">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->batch_number }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->expiry_date }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->status }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->initial_qty }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->receiving_items->sum('qty') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->consumptions->sum('qty') }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>


</div>
