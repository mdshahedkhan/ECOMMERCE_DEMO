<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public $Search;
    public $Product_Category;
    public $Product_Category_id;

    public function Mount()
    {
        $this->Product_Category = 'All Category';
        $this->fill(request()->only('search', 'product_category', 'product_category_id'));
    }

    public function render()
    {
        $categories = Category::where('root', 0)->orderBy('name', 'ASC')->get();
        return view('livewire.header-search-component', compact('categories'));
    }
}
