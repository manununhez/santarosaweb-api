<?php

namespace App\Admin\Controllers;

use Illuminate\Support\Str;

use App\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Productos';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('product_id', __('Product id'));
        $grid->column('name', __('Nombre'));
        $grid->column('description', __('Descripción'));
        $grid->column('image_url', __('Imagen (URL)'));
        $grid->column('price', __('Precio'));
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        // The filter($callback) method is used to set up a simple search box for the table
        $grid->filter(function ($filter) {

            // Sets the range query for the created_at field
            $filter->between('created_at', 'Created Time')->datetime();
        });

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
        $show = new Show(Product::findOrFail($id));

        $show->field('product_id', __('Product id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('image_url', __('Imagen (URL)'));
        $show->field('price', __('Price'));
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
        $form = new Form(new Product());

        $form->hidden('product_id');
        $form->text('name', __('Nombre'))->placeholder('Nombre del producto')->required();
        $form->textarea('description', __('Descripción'))->placeholder('Breve descripción')->required();
        $form->currency('price', __('Precio'))->symbol('Gs.')->required();

        $form->image('image_url', 'Imagen del producto')->required();

        $form->saving(function (Form $form) {
            $form->product_id = Str::lower(str_replace(" ", "-", $form->name));
        });

        return $form;
    }
}
