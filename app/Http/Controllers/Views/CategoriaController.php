<?php


namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use App\Section;

use App\Category;

class CategoriaController
{
        public function index(Section $section) { 
                $categoriesId = $section->categories->pluck('category_id');
                $categories = Category::
                whereIn('category_id',$categoriesId) //not repeated in UserTasks
                ->get();    
                return view('categoria', ['section'=> $section, 'categories' => $categories]);
        }
}