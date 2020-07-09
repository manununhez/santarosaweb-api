<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        try{
            $id = 'address-'.Str::lower(str_replace(" ", "-", $input['address_1']));
            $address = ItemAddress::create([
                'item_address_id' => $id, //code - item name
                'address_1' => $input['address_1'],
                'address_2' => isset($input['address_2']) ? $input['address_2'] : null,
                'house_number' => isset($input['house_number']) ? $input['house_number'] : null,
                'neighborhood' => isset($input['neighborhood']) ? $input['neighborhood'] : null,
                'city' => $input['city'],
                'postal_code' => isset($input['postal_code']) ? $input['postal_code'] : null,
                'coordinate_latitude' => $input['coordinate_latitude'],
                'coordinate_longitude' => $input['coordinate_longitude'],
            ]);
        } catch(Exception $exception){
            return $this->sendError($exception, 500);
        }

        //then, create itemcategory
        try{
            $id = Str::lower(str_replace(" ", "-", $input['name']));
            $item = ItemCategory::create([
                'item_category_id' => $id,
                'name' => $input['name'],
                'description' => isset($input['description']) ? $input['description'] : null,
                'address_item_id' => $address['item_address_id'],
                'website' => isset($input['website']) ? $input['website'] : null,
                'phone' => isset($input['phone']) ? $input['phone'] : null,
                'image_url' => isset($input['image_url']) ? $input['image_url'] : null,
                'delivery_available' => $input['delivery_available'],
                'info_hours_id' => $input['info_hours_id'],
                'info_hours_opening' => $input['info_hours_opening'],
                'info_hours_closing' => $input['info_hours_closing'],
            ]);
        } catch(Exception $exception){
            return $this->sendError($exception, 500);
        }
 
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
