<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Section;
use App\Category;

use Validator;

class SectionsController extends BaseController
{
    /**
     * 
     */
    public function index()
    {
        return $this->sendResponse(Section::paginate(), 'Sections retrieved successfully.');
    }
 
    /**
     * 
     */
    public function show(Section $section)
    {
        return $this->sendResponse($section, 'Section retrieved successfully.');
    }

    /**
     * 
     */
    public function showCategories(Section $section)
    {
        $categoriesId = $section->categories->pluck('category_id');
        $categories = Category::
            whereIn('id',$categoriesId) //not repeated in UserTasks
            ->paginate(10);
        return $this->sendResponse($categories, 'Section retrieved successfully.');
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

        $section = Section::create($request->all());
 
        if(is_null($section))
            return $this->sendError('Section could not be created', 500);
        else
            return $this->sendResponse($section, "Section created successfully", 201);
    }
 
    /**
     * 
    */
    public function update(Request $request, Section $section)
    {
        $section->update($request->all());
 
        return $this->sendResponse($section, "Section updated successfully", 200);
    }
 
    /**
     * 
     */
    public function delete(Section $section)
    {
        $section->delete();
 
        return $this->sendResponse(null, "Section deleted successfully", 204);
    }
}
