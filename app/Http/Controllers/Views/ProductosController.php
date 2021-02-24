<?php


namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;

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
                        if (array_key_exists($key, $val)) {
                                $result[$val[$key]][] = $val;
                        } else {
                                $result[""][] = $val;
                        }
                }

                return $result;
        }
}
