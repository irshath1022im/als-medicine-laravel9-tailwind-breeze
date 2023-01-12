@extends('layouts.app')

@section('content')

@livewire('item.item-show',['item' => $item])

@endsection
