<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeBanner1;

class AdminHomeBanner1Component extends Component
{
  public function deleteHomeBanner1($homebanner1_id)
  {
    $homebanner1= HomeBanner1::find($homebanner1_id);
    $homebanner1->delete();
    session()->flash('message','HomeBanner1 has been deleted successfully!');
  }
    public function render()
    {
        $homebanners1= HomeBanner1::all();
        return view('livewire.admin.admin-home-banner1-component',['homebanners1'=>$homebanners1])->layout('layouts.base');
    }
}
