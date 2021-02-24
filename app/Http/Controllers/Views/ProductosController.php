<?php


namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Section;
use App\Category;
use App\ItemCategory;
use App\Product;

class ProductosController
{
        public function index(Section $section, Category $category, ItemCategory $item)
        {
                $productsId = $item->products->pluck('product_id');
                $products = Product::whereIn('product_id', $productsId) //not repeated in UserTasks
                        ->get();

                $productsByTag = $this->group_by("tag", $products);
		
		//Log::info(json_encode($productsByTag));
		
		//Log::info(json_encode($products));
		
		return view('productos', [
                        'section' => $section, 'category' => $category,
                        'item' => $item, 'products' => $products,
                        'productsByTag' => $productsByTag
                ]);
        }


        /**
         * Function that groups an array of associative arrays by some key.
         * 
         * @param {String} $key Property to sort by.
         * @param {Array} $data Array that stores multiple associative arrays.
         */
        function group_by($key, $data)
        {
                $result = array();

                foreach ($data as $val) {
			//Lower case everything
			$index = strtolower($val[$key]);
			//Convert whitespaces and underscore to dash
    			$index = preg_replace("/[\s_]/", "-", $index);
			$result[$index][] = $val;
                }

                return $result;
        }
}
