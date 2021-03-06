<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|string',
            'description' => 'string',
            'image_url_icon' => 'string',
            'image_url_logo' => 'string',
            'image_url_slider_1' => 'string',
            'image_url_slider_2' => 'string',
            'image_url_slider_3' => 'string',
            'title_slider_1' => 'string',
            'title_slider_2' => 'string',
            'title_slider_3' => 'string',
            'btn_text_slider_1' => 'string',
            'btn_link_slider_1' => 'string',
            'btn_text_slider_2' => 'string',
            'btn_link_slider_2' => 'string',
            'btn_text_slider_3' => 'string',
            'btn_link_slider_3' => 'string',
            'description_slider_1' => 'string',
            'description_slider_2' => 'string',
            'description_slider_3' => 'string',
            'product_type' => 'string',
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
            'whatsapp' => 'string',
            'delivery_available' => 'boolean',
            //info hours
            'info_hours_id' => 'required|integer',
            'info_hours_opening' => 'required|string',
            'info_hours_closing' => 'required|string',
            //footer
            'footer_title' => 'string',
            'footer_description' => 'string',
            //social networks
            'twitter' => 'string',
            'facebook' => 'string',
            'instagram' => 'string',
            'linkedin' => 'string',
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
                'product_type' => isset($input['product_type']) ? $input['product_type'] : null,
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
                'whatsapp' => isset($input['whatsapp']) ? $input['whatsapp'] : null,
                'image_url_icon' => isset($input['image_url_icon']) ? $input['image_url_icon'] : null,
                'image_url_logo' => isset($input['image_url_logo']) ? $input['image_url_logo'] : null,
                'image_url_slider_1' => isset($input['image_url_slider_1']) ? $input['image_url_slider_1'] : null,
                'image_url_slider_2' => isset($input['image_url_slider_2']) ? $input['image_url_slider_2'] : null,
                'image_url_slider_3' => isset($input['image_url_slider_3']) ? $input['image_url_slider_3'] : null,
                'title_slider_1' => isset($input['title_slider_1']) ? $input['title_slider_1'] : null,
                'title_slider_2' => isset($input['title_slider_2']) ? $input['title_slider_2'] : null,
                'title_slider_3' => isset($input['title_slider_3']) ? $input['title_slider_3'] : null,
                'btn_text_slider_1' => isset($input['btn_text_slider_1']) ? $input['btn_text_slider_1'] : null,
                'btn_link_slider_1' => isset($input['btn_link_slider_1']) ? $input['btn_link_slider_1'] : null,
                'btn_text_slider_2' => isset($input['btn_text_slider_2']) ? $input['btn_text_slider_2'] : null,
                'btn_link_slider_2' => isset($input['btn_link_slider_2']) ? $input['btn_link_slider_2'] : null,
                'btn_text_slider_3' => isset($input['btn_text_slider_3']) ? $input['btn_text_slider_3'] : null,
                'btn_link_slider_3' => isset($input['btn_link_slider_3']) ? $input['btn_link_slider_3'] : null,
                'description_slider_1' => isset($input['description_slider_1']) ? $input['description_slider_1'] : null,
                'description_slider_2' => isset($input['description_slider_2']) ? $input['description_slider_2'] : null,
                'description_slider_3' => isset($input['description_slider_3']) ? $input['description_slider_3'] : null,
                'delivery_available' => $input['delivery_available'],
                'info_hours_id' => $input['info_hours_id'],
                'info_hours_opening' => $input['info_hours_opening'],
                'info_hours_closing' => $input['info_hours_closing'],
                'footer_title' => isset($input['footer_title']) ? $input['footer_title'] : null,
                'footer_description' => isset($input['footer_description']) ? $input['footer_description'] : null,
                'twitter' => isset($input['twitter']) ? $input['twitter'] : null,
                'facebook' => isset($input['facebook']) ? $input['facebook'] : null,
                'instagram' => isset($input['instagram']) ? $input['instagram'] : null,
                'linkedin' => isset($input['linkedin']) ? $input['linkedin'] : null,
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
