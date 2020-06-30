<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Section;

use Exception;

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
        $section = Section::create([
            'section_id' => $id,
            'name' => $input['name'],
            'description' => $input['description'],
            'image_url' => $input['image_url'],
        ]);
 
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
