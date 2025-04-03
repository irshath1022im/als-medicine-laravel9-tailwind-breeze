<div>

    <div wire:loading>Loading</div>

    <div class="card" >
        <div class="card-header flex justify-between">
            <div class="card-heading">CONSUMPTION</div>
            <div class="card-heading">
                <span class="uppercase">{{ $item_name }} ||</span>
                <span class="uppercase">{{ $erp_code }}</span>
            </div>
        </div>

        <div class="card-body" wire:loading.remove>

            <form action="">

                <div class="form-group flex-1">
                    <label for="" class="form-label">Badge</label>
                    <input type="text" class="form-controll" placeholder="Badge" wire:model="batch_number" disabled>
                </div>

                    <div class="flex just justify-between">

                        <div class="form-group flex-1">
                            <label for="" class="form-label">Date</label>
                            <input type="date" class="form-controll" wire:model="date">
                        </div>


                        <div class="form-group">
                            <label for="" class="form-label">Qty</label>
                            <input type="text" class="form-controll" placeholder="Qty" wire:model.blur="qty">

                            {{-- <button class="btn btn-info">{{ $initialQty }}</button> +
                            <button class="btn btn-info">{{ $totalReceiving }}</button>
                            -
                            <button class="btn btn-info">{{ $totalConsumption }}</button>
                            + --}}
                            <span>Available Qty: </span><button class="btn btn-info">{{ $availableQty }}</button>

                             <x-formError field="qty"></x-formError>

                        </div>


                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Location</label>
                        <select name="" id="" class="form-controll" wire:model="location_id">
                            <option value="" >Select</option>
                        </select>
                    </div>

                    <div>
                        <button class="btn btn-submit">Submit</button>
                    </div>

            </form>
        </div>
    </div>


</div>

