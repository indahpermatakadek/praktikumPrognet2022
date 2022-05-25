<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductImages;
use Livewire\Component;
use Livewire\WithPagination;

class ProductLivewire extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $products = Product::where('product_name', 'like', '%' . $this->search . '%')->paginate(8);
        $producsimage = ProductImages::all();
        return view('livewire.product-livewire', compact('products', 'producsimage'));
    }
}
