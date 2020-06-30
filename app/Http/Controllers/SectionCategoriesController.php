<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Section;
use App\Category;
use App\CategorySection;

use Exception;

use Validator;

class SectionCategoriesController extends BaseController
{

    /**
     * 
     */
    public function show(Section $section)
    {
        $categoriesId = $section->categories->pluck('category_id');
        $categories = Category::
            whereIn('category_id',$categoriesId) //not repeated in UserTasks
            ->paginate(10);
        // return $this->sendResponse($section, 'Section categories retrieved successfully.');
        return $this->sendResponse($categories, 'Section categories retrieved successfully.');
    }
 
    /**
     * 
     */
    public function store(Request $request, Section $section)
    {
        $input = $request->all();

        //category data
        $validator = Validator::make($input, [
            'name' => 'required|string',
            'description' => 'string',
            'image_url' => 'string',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        try{
            $id = Str::lower(str_replace(" ", "-", $input['name']));
            $category = Category::create([
                'category_id' => $id,
                'name' => $input['name'],
                'description' => $input['description'],
                'image_url' => $input['image_url'],
            ]);
        } catch(Exception $exception){
            return $this->sendError($exception, 500);
        }
        
        if(is_null($category))
            return $this->sendError('Category could not be created', 500);

        CategorySection::create([
            'section_id' => $section['section_id'],
            'category_id' => $category['category_id'],
        ]);
 
        // if(is_null($category))
        //     return $this->sendError('Category could not be created', 500);
        // else
        return $this->sendResponse($category, "Category created successfully", 201);
    }
}
