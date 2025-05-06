<div>

    <div>
        <input type="text" class="form-controll" placeholder="Search Item">
    </div>

<div class="table-overflow">
    <table class="table">
        <thead class="table-head">
            <th class="table-th">#</th>
            <th class="table-th">Date</th>
            <th class="table-th">item name</th>
            <th class="table-th">qty</th>
            <th class="table-th">remark</th>
        </thead>

        <tbody>

            @foreach ($consumptions as $item)

            <tr class="table-tr">
                <td class="table-td">{{ $item->id }}</td>
                <td class="table-td">{{ $item->date }}</td>
                <td class="table-td">{{ $item->item->name}}</td>
                <td class="table-td">{{ $item->qty}}</td>
                <td class="table-td">Remark</td>
            </tr>
            @endforeach

        </tbody>


    </table>

    {{ $consumptions->links() }}


</div>

