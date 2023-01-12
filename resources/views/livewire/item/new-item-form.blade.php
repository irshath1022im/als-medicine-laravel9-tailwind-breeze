<div>
    <div wire:loading>
        <x-spinner></x-spinner>
    </div>


   <x-session-created></x-session-created>

    <form action="">
        <div class="mb-2">
            <label for="" class="text-sm font-medium">Iten Name</label>
            <input type="text" class="form-controll" wire:model.defer="name">



            @error('name')

                <div class="bg-red-300 px-2 py-3 rounded-lg">
                    <p>{{ $message }}</p>
                </div>

            @enderror
        </div>

        <div class="mb-2">
            <label for="" class="text-sm font-medium">ERP code</label>
            <input type="text" class="form-controll" wire:model.defer="erp_code">
            @error('erp_code')

            <div class="bg-red-300 px-2 py-3 rounded-lg">
                <p>{{ $message }}</p>
            </div>

        @enderror
        </div>

        <div class="mb-2">
            <label for="" class="text-sm font-medium">Thumbnail</label>
            <input type="file" class="form-controll" wire:model.defer="thumbnail">

            @if (isset($thumbnail))
                <div class="w-44 border-2">

                    <img src="{{ Storage::url($thumbnail) }}" class="w-full" />
                </div>
            @endif

            @error('thumbnail')

                <div class="bg-red-300 px-2 py-3 rounded-lg">
                    <p>{{ $message }}</p>
                </div>

            @enderror
        </div>

        <div class="mb-2">
            <label for="" class="text-sm font-medium">Category</label>
            <select name="" id="" type="select" class="form-controll" wire:model.defer="category_id">
                <option value="">Select</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            @error('category_id')

            <div class="bg-red-300 px-2 py-3 rounded-lg">
                <p>{{ $message }}</p>
            </div>

        @enderror
        </div>

        <div class="mb-2">
            <label for="" class="text-sm font-medium">Remark</label>
            <textarea name="" id="" cols="30" rows="5" type="textarea" class="form-controll" wire:model.defer="remark"></textarea>
        </div>

        <div>

            @if ($editItemId)

            <button class="btn bg-red-400" type="button " wire:click="editItem">UPDATE</button>

            @else
            <button class="btn bg-blue-400" type="button" wire:click="formSubmit">SUBMIT</button>

            @endif
        </div>

    </form>
</div>
