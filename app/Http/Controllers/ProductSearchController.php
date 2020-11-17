<?php

namespace App\Http\Controllers;

use App\Product;
use Spatie\Searchable\Search;
use Illuminate\Http\Request;

class ProductSearchController extends BaseController
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('query');
        // $results = (new Search())
        //     ->registerModel(Product::class, ['name', 'price'])
        //     ->search($searchTerm);
        $product = Product::where('name', 'LIKE', "%{$searchTerm}%")->first();
        $category = $product->itemCategoryProduct->categoryItem->categoryItemCategory->category;
        $section = $category->categorySection->section;

         
        $url = route('inicio', "/section/".$section->name."/category/".$category->name."/item/".$product->name);
        return $this->sendResponse($url, "Success!");
    }
}
