<?php

namespace App\Http\Livewire\Admin;
use App\Models\HomeBanner1;
use Carbon\Carbon;
use Livewire\WithFileUploads;

use Livewire\Component;

class AdminAddHomebanner1Component extends Component
{
  use WithFileUploads;
  public $link;
  public $image;
  public $status;

    public function mount()
    {
       $this->status = 0;
    }
    public function addHomeBanner1()
    {
      $homebanner1= new HomeBanner1();

      $homebanner1->link=$this->link;
      $imagename= Carbon::now()->timestamp.'.'. $this->image->extension();
      $this->image->storeAs('homebanners',$imagename);
      $homebanner1->image=$imagename;
      $homebanner1->status=$this->status;
      $homebanner1->save();
      session()->flash('message','HomeBanner1 has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-homebanner1-component')->layout('layouts.base');
    }
}
