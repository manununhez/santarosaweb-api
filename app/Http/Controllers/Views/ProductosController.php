<?php


namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;

use App\Section;
use App\Category;
use App\ItemCategory;
use App\Product;

class SubCategoriaController
{
        public function index(Section $section, Category $category, ItemCategory $item) { 
                $productsId = $item->products->pluck('product_id');
                $products = Product::
                whereIn('product_id',$productsId) //not repeated in UserTasks
                ->get();
                return view('productos', ['section'=> $section, 'category' => $category,
                'item' => $item, 'products' =>$products]);
        }
}