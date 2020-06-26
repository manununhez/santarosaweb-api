<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ItemCategory;
use App\Product;

use Validator;

class ItemsCategoryController extends BaseController
{
       /**
     * 
     */
    public function index()
    {
        return $this->sendResponse(ItemCategory::paginate(), 'Items retrieved successfully.');
    }
 
    /**
     * 
     */
    public function show(ItemCategory $item)
    {
        return $this->sendResponse($item, 'ItemCategory retrieved successfully.');
    }

    /**
     * 
     */
    public function showProducts(ItemCategory $item)
    {
        $productsId = $item->products->pluck('product_id');
        $products = Product::
            whereIn('id',$productsId) //not repeated in UserTasks
            ->paginate(10);
        return $this->sendResponse($products, 'Products of category retrieved successfully.');
    }
 
    /**
     * 
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'image_url' => 'required|string',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $item = ItemCategory::create($request->all());
 
        if(is_null($item))
            return $this->sendError('ItemCategory could not be created', 500);
        else
            return $this->sendResponse($item, "ItemCategory created successfully", 201);
    }
 
    /**
     * 
    */
    public function update(Request $request, ItemCategory $item)
    {
        $item->update($request->all());
 
        return $this->sendResponse($item, "ItemCategory updated successfully", 200);
    }
 
    /**
     * 
     */
    public function delete(ItemCategory $item)
    {
        $item->delete();
 
        return $this->sendResponse(null, "ItemCategory deleted successfully", 204);
    }
}
