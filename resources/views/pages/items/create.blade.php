@extends('layouts.app')

@section('content')



    <div class="card">
        <div class="card-header">
            <div class="card-heading">CREATE ITEM</div>
        </div>

        <div class="card-body">
            @if (isset($item))

                @livewire('item.new-item-form',['item' => $item])
            @else

                @livewire('item.new-item-form',['item' => null])

            @endif
        </div>
    </div>

@endsection
