<?php

namespace App\Http\Controllers;

use App\ItemCategory;
use App\Category;
use App\Product;
use App\Section;
use Spatie\Searchable\Search;
use Illuminate\Http\Request;

class ProductSearchController extends BaseController
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('query');
	
	    $results = (new Search())
             ->registerModel(Product::class, ['name'])
             ->registerModel(ItemCategory::class, ['name'])
             ->registerModel(Category::class, ['name'])
             ->registerModel(Section::class, ['name'])
             ->search($searchTerm);
	
    	return $this->sendResponse($results, "Success!");
    }
}
