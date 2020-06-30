<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Product;
use App\ItemCategoryProduct;
use App\ItemCategory;

use Validator;

class ItemCategoryProductsController extends BaseController
{
    /**
     * 
     */
    public function show(ItemCategory $item)
    {
        $productsId = $item->products->pluck('product_id');
        $products = Product::
            whereIn('product_id',$productsId) //not repeated in UserTasks
            ->paginate(10);
        return $this->sendResponse($products, 'Products of category retrieved successfully.');
    }

     /**
     * Store products by item
     */
    public function store(Request $request, ItemCategory $item){
        $input = $request->all();

        //Product data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'image_url' => 'required|string',
            'price' => 'required|string',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        try{
            $id = Str::lower(str_replace(" ", "-", $input['name']));
            $product = Product::create([
                'product_id' => $id,
                'name' => $input['name'],
                'description' => $input['description'],
                'image_url' => $input['image_url'],
                'price' => $input['price'],
            ]);
        } catch(Exception $exception){
            return $this->sendError($exception, 500);
        }
        
        if(is_null($product))
            return $this->sendError('Product could not be created', 500);

        ItemCategoryProduct::create([
            'product_id' => $product['product_id'],
            'item_category_id' => $item['item_category_id'],
        ]);
 
        // if(is_null($category))
        //     return $this->sendError('Category could not be created', 500);
        // else
        return $this->sendResponse($product, "Product created successfully", 201);
    }
}