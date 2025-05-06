<?php

namespace App\Livewire\LandingPages;

use App\Models\Consumption;
use Livewire\Component;

class ConsumptionIndexPage extends Component
{

    public $searchValue = "ALAMYCIN BLUE SPSAY";
    public function render()
    {

        $results = Consumption::with(['item'])
        ->orderBy('id')
        ->paginate(15);

        return view('livewire.landing-pages.consumption-index-page',['consumptions' => $results])
            ->extends('components.layouts.app')
        ;
    }
}
