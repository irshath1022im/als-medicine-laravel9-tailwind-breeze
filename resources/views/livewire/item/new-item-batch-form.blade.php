<div>

    <form action="">
        <div>
            <label for="" class="form-label">Item</label>
            <input type="text" class="form-controll" value="{{ $item_id }}" disabled />
        </div>

        <div>
            <label for="" class="form-label">Posted Date</label>
            <input type="date" class="form-controll"  />
        </div>

        <div class="flex">
            <div class="basis-2/6">
                <label for="" class="form-label">Batch Number</label>
                <input type="text" class="form-controll" placeholder="Batch Number"  />
            </div>

            <div class="basis-2/6">
                <label for="" class="form-label">Expiry Date</label>
                <input type="date" name="" id="" class="form-controll" />
            </div>

            <div class="basis-1/6">
                <label for="" class="form-label">Initial Qty</label>
                <input type="number" class="form-controll">
            </div>

            <div class="basis-1/6">
                <label for="" class="form-label">Status</label>
                    <select name="" id="" class="form-controll">
                        <option value="">Select</option>
                        <option value="active">Active</option>
                        <option value="stored">Stored</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
            </div>
        </div>

        <div>
            <label for="" class="form-label">Bar Code</label>
            <input type="text" class="form-controll" />
        </div>

        <div>
            <x-button type="button" class="bg-blue-500 hover:bg-blue-500 focus:bg-blue-500 border-blue-500 ring active:bg-blue-600">Submit</x-button>
        </div>


    </form>




























</div>
