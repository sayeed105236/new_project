<?php

namespace App\Http\Livewire;
use App\Models\HomeSlider;
use App\Models\HomeCategory;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sale;
use App\Models\HomeBanner1;

use Livewire\Component;

class HomeComponent extends Component
{

    public function render()
    {
        $sliders= HomeSlider::where('status',1)->get();
        $lproducts= Product::orderBy('created_at','DESC')->get()->take(15);
        $category=HomeCategory::find(1);
        $cats=explode(',',$category->sel_categories);
        $categories= Category::whereIn('id',$cats)->get();
        $no_of_products= $category->no_of_products;
        $sproducts= Product::where('sale_price','>',0)->inRandomOrder()->get()->take(10);
        $sale=Sale::find(1);
        $homebanners1= HomeBanner1::where('status',1)->get();
        return view('livewire.home-component',['sliders'=>$sliders,'lproducts'=>$lproducts,'categories'=>$categories,'no_of_products'=>$no_of_products,'sproducts'=>$sproducts,'sale'=>$sale,'homebanners1'=>$homebanners1])->layout('layouts.base');
    }
}
