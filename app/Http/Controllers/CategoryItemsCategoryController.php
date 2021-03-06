<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\ItemCategory;
use App\CategoryItemCategory;
use App\Category;

use Exception;

use Validator;

class CategoryItemsCategoryController extends BaseController
{

    /**
     * Show items
     */
    public function show(Category $category)
    {
        $itemsId = $category->items->pluck('item_category_id');
        $items = ItemCategory::
            whereIn('item_category_id',$itemsId) //not repeated in UserTasks
            ->paginate(10);
        return $this->sendResponse($items, 'Items of category retrieved successfully.');
    }

    /**
     * Store items by category
     */
    public function store(Request $request, Category $category){
        $input = $request->all();

        //item data
        $validator = Validator::make($input, [
            'name' => 'required|string',
            'description' => 'string',
            'image_url_icon' => 'string',
            'image_url_logo' => 'string',
            'image_url_1' => 'string',
            'image_url_2' => 'string',
            'image_url_3' => 'string',
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
            'email' => 'string',
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
        
        //then, create itemcategory
        try{
            $id = Str::lower(str_replace(" ", "-", $input['name']));
            $item = ItemCategory::create([
                'item_category_id' => $id,
                'name' => $input['name'],
                'description' => isset($input['description']) ? $input['description'] : null,
                'address_1' => $input['address_1'],
                'address_2' => isset($input['address_2']) ? $input['address_2'] : null,
                'house_number' => isset($input['house_number']) ? $input['house_number'] : null,
                'neighborhood' => isset($input['neighborhood']) ? $input['neighborhood'] : null,
                'city' => $input['city'],
                'postal_code' => isset($input['postal_code']) ? $input['postal_code'] : null,
                'coordinate_latitude' => $input['coordinate_latitude'],
                'coordinate_longitude' => $input['coordinate_longitude'],
                'website' => isset($input['website']) ? $input['website'] : null,
                'email' => isset($input['email']) ? $input['email'] : null,
                'phone' => isset($input['phone']) ? $input['phone'] : null,
                'image_url_icon' => isset($input['image_url_icon']) ? $input['image_url_icon'] : null,
                'image_url_logo' => isset($input['image_url_logo']) ? $input['image_url_logo'] : null,
                'image_url_1' => isset($input['image_url_1']) ? $input['image_url_1'] : null,
                'image_url_2' => isset($input['image_url_2']) ? $input['image_url_2'] : null,
                'image_url_3' => isset($input['image_url_3']) ? $input['image_url_3'] : null,
                'delivery_available' => $input['delivery_available'],
                'info_hours_id' => $input['info_hours_id'],
                'info_hours_opening' => $input['info_hours_opening'],
                'info_hours_closing' => $input['info_hours_closing'],
            ]);
        } catch(Exception $exception){
            return $this->sendError($exception, 500);
        }
        
        if(is_null($item))
            return $this->sendError('Category could not be created', 500);

        CategoryItemCategory::create([
            'item_category_id' => $item['item_category_id'],
            'category_id' => $category['category_id'],
        ]);
 
        // if(is_null($category))
        //     return $this->sendError('Category could not be created', 500);
        // else
        return $this->sendResponse($item, "Item category created successfully", 201);
    }
}
