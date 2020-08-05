<?php

namespace App\Admin\Controllers;

use App\CategoryItemCategory;
use App\Category;
use App\ItemCategory;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryItemCategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Categorias y sus sub-categorias';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CategoryItemCategory());

        $grid->column('id', __('Id'));
        $grid->column('category_id', __('Category id'));
        $grid->column('item_category_id', __('Item category id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(CategoryItemCategory::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'));
        $show->field('item_category_id', __('Item category id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
	}

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CategoryItemCategory());

        //$form->text('category_id', __('Category id'));
        //$form->text('item_category_id', __('Item category id'));

        $form->select('category_id', __('Seleccionar la categoria'))->options(Category::all()->pluck('name', 'category_id'));
	$form->select('item_category_id', __('Seleccionar la subCtegoria'))->options(ItemCategory::all()->pluck('name', 'item_category_id'));
        return $form;
    }
}
