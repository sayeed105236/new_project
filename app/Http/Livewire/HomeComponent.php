<?php

namespace App\Http\Livewire;
use App\Models\HomeSlider;

use Livewire\Component;

class HomeComponent extends Component
{
    $sliders= HomeSlider::where('status',1)->get();
    public function render()
    {
        return view('livewire.home-component',['sliders'=>$sliders])->layout('layouts.base');
    }
}
