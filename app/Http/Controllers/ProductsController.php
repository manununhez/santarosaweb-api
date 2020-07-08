<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Product;

use Validator;

class ProductsController extends BaseController
{
 
    /**
     * 
     */
    public function index()
    {
        return $this->sendResponse(Product::paginate(), 'Products retrieved successfully.');
    }
 
    /**
     * 
     */
    public function show(Product $product)
    {
        return $this->sendResponse($product, 'Product retrieved successfully.');
    }
 
    /**
     * 
     */
    public function store(Request $request)
    {

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|string',
            'description' => 'required|string',
            'image_url' => 'required|string',
            'price' => 'required|string',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $id = Str::lower(str_replace(" ", "-", $input['name']));

        $product = Product::create([
            'product_id' => $id,
            'name' => $input['name'],
            'description' => $input['description'],
            'image_url' => $input['image_url'],
            'price' => $input['price'],
        ]);
 
        if(is_null($product))
            return $this->sendError('Category could not be created', 500);
        else
            return $this->sendResponse($product, "Product created successfully", 201);
    }
 
    /**
     * 
    */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
 
        return $this->sendResponse($product, "Product updated successfully", 200);
    }
 
    /**
     * 
     */
    public function delete(Product $product)
    {
        $product->delete();
 
        return $this->sendResponse(null, "Product deleted successfully", 204);
    }
 
}
