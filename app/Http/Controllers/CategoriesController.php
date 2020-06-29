<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\ItemCategory;

use Validator;

class CategoriesController extends BaseController
{
    /**
     * 
     */
    public function index()
    {
        return $this->sendResponse(Category::paginate(), 'Categories retrieved successfully.');
    }
 
    /**
     * 
     */
    public function show(Category $category)
    {
        return $this->sendResponse($category, 'Category retrieved successfully.');
    }

    /**
     * 
     */
    public function showItems(Category $category)
    {
        $itemsId = $category->items->pluck('category_item_id');
        $items = ItemCategory::
            whereIn('id',$itemsId) //not repeated in UserTasks
            ->paginate(10);
        return $this->sendResponse($items, 'Items of category retrieved successfully.');
    }
 
    /**
     * 
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'string',
            'image_url' => 'string',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $category = Category::create($request->all());
 
        if(is_null($category))
            return $this->sendError('Category could not be created', 500);
        else
            return $this->sendResponse($category, "Category created successfully", 201);
    }
 
    /**
     * 
    */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
 
        return $this->sendResponse($category, "Category updated successfully", 200);
    }
 
    /**
     * 
     */
    public function delete(Category $category)
    {
        $category->delete();
 
        return $this->sendResponse(null, "Category deleted successfully", 204);
    }
}
