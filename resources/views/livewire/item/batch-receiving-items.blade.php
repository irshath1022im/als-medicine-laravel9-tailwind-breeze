<div>

    <div wire:loading>
        <x-spinner></x-spinner>
    </div>

    <table class="w-full">
        <thead class="uppercase bord">
            <th class="p-2 border ">LINE #</th>
            <th class="p-2 border ">DATE</th>
            <th class="p-2 border ">RECE ID</th>
            <th class="p-2 border ">BATCH NUMBER</th>
            <th class="p-2 border ">qty #</th>
            <th class="p-2 border ">unit price #</th>
            <th class="p-2 border ">cost</th>
        </thead>

        <tbody>

            @foreach ($receiving_items as $item)

            <tr class="" wire:loading.remove>
                <td class="p-2 border ">{{ $item->id }}</td>
                <td class="p-2 border ">{{ $item->receiving->date }}</td>
                <td class="p-2 border ">{{ $item->receiving_id }}</td>
                <td class="p-2 border ">{{ $item->batch_number->batch_number }}</td>
                <td class="p-2 border ">{{ $item->qty }}</td>
                <td class="p-2 border ">{{ $item->unit_price }}</td>
                <td class="p-2 border ">{{ $item->cost }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $receiving_items->links() }}
</div>
