<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Category;

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
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|string',
            'description' => 'string',
            'image_url' => 'string',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $id = Str::lower(str_replace(" ", "-", $input['name']));
        $category = Category::create([
            'category_id' => $id,
            'name' => $input['name'],
            'description' => $input['description'],
            'image_url' => $input['image_url'],
        ]);
 
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
