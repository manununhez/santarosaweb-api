<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ItemCategory;
use App\Product;
use App\ItemAddress;

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
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'name' => 'required|string',
            'description' => 'string',
            'image_url' => 'string',
            //address
            'address_1' => 'required|string',
            'address_2' => 'string',
            'house_number' => 'string',
            'neighborhood' => 'string',
            'city' => 'required|string',
            'postal_code' => 'string',
            'coordinate_latitude' => 'required|string',
            'coordinate_longitude' => 'required|string',
            'website' => 'string',
            'phone' => 'string',
            'delivery_available' => 'boolean',
            //info hours
            'info_hours_id' => 'required|integer',
            'info_hours_opening' => 'required|string',
            'info_hours_closing' => 'required|string',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        //First create address
        $address = ItemAddress::create([
            'address_1' => $input['address_1'],
            'address_2' => $input['address_2'],
            'house_number' => $input['house_number'],
            'neighborhood' => $input['neighborhood'],
            'city' => $input['city'],
            'postal_code' => $input['postal_code'],
            'coordinate_latitude' => $input['coordinate_latitude'],
            'coordinate_longitude' => $input['coordinate_longitude'],
        ]);
        //then, create itemcategory
        $item = ItemCategory::create([
            'name' => $input['name'],
            'description' => $input['description'],
            'address_item_id' => $address['id'],
            'website' => $input['website'],
            'phone' => $input['phone'],
            'image_url' => $input['image_url'],
            'delivery_available' => $input[' delivery_available'],
            'info_hours_id' => $input['info_hours_id'],
            'info_hours_opening' => $input['info_hours_opening'],
            'info_hours_closing' => $input['info_hours_closing'],
        ]);
 
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
