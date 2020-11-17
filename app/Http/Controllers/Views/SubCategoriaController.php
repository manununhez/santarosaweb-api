<?php


namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;

use App\Section;
use App\Category;
use App\ItemCategory;

class SubCategoriaController
{
        public function index(Section $section, Category $category)
        {
                $itemsId = $category->items->pluck('item_category_id');
                $items = ItemCategory::whereIn('item_category_id', $itemsId) //not repeated in UserTasks
                        ->get();
                return view('sub_categoria', [
                        'section' => $section, 'category' => $category,
                        'items' => $items
                ]);
        }
}
