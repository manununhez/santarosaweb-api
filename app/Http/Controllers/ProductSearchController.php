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
	
	    $results = (new Search())
             ->registerModel(Product::class, ['name'])
             ->search($searchTerm);
	
    	return $this->sendResponse($results, "Success!");
    }
}
