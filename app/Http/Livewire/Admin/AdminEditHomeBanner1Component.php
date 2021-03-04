<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeBanner1;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditHomeBanner1Component extends Component
{
  use WithFileUploads;




  public $link;
  public $image;
  public $status;
  public $newimage;
  public $homebanner1_id;

    public function mount($homebanner1_id)
    {
      $homebanner1= HomeBanner1::find($homebanner1_id);
      $this->link= $homebanner1->link;
      $this->image= $homebanner1->image;
      $this->status= $homebanner1->status;
      $this->homebanner1_id=$homebanner1->id;

    }
    public function updateHomeBanner1()
    {
      $homebanner1 = HomeBanner1::find($this->homebanner1_id);
      $homebanner1->link =$this->link;
      if($this->newimage)
      {
        $imagename= Carbon::now()->timestamp.'.'. $this->newimage->extension();
        $this->newimage->storeAs('homebanners',$imagename);
        $homebanner1->image=$imagename;
      }


      $homebanner1->status =$this->status;
      $homebanner1->save();
      session()->flash('message','HomeBanner1 has been updated successfully!');


    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-banner1-component')->layout('layouts.base');
    }
}
