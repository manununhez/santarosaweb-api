<?php

namespace App\Admin\Controllers;

use App\ItemCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ItemCategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Sub-categorias';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ItemCategory());

        $grid->column('item_category_id', __('Item category id'));
        $grid->column('name', __('Nombre'));
        $grid->column('description', __('Descripción'));
        $grid->column('address_item_id', __('Address item id'));
        $grid->column('website', __('Página web'));
        $grid->column('phone', __('Teléfono'));
        $grid->column('image_url', __('Image (URL)'));
        $grid->column('delivery_available', __('Delivery disponible (V/F)'));
        $grid->column('info_hours_id', __('Info hours id'));
        $grid->column('info_hours_opening', __('Horas de apertura'));
        $grid->column('info_hours_closing', __('Horas de cierre'));
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
        $show = new Show(ItemCategory::findOrFail($id));

        $show->field('item_category_id', __('Item category id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('address_item_id', __('Address item id'));
        $show->field('website', __('Website'));
        $show->field('phone', __('Phone'));
        $show->field('image_url', __('Image url'));
        $show->field('delivery_available', __('Delivery available'));
        $show->field('info_hours_id', __('Info hours id'));
        $show->field('info_hours_opening', __('Info hours opening'));
        $show->field('info_hours_closing', __('Info hours closing'));
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
        $form = new Form(new ItemCategory());

        $form->text('name', __('Name'));
        $form->text('description', __('Description'));
        $form->text('address_item_id', __('Address item id'));
        $form->text('website', __('Website'));
        $form->mobile('phone', __('Phone'));
        $form->text('image_url', __('Image url'));
        $form->switch('delivery_available', __('Delivery available'));
        $form->text('info_hours_id', __('Info hours id'));
        $form->text('info_hours_opening', __('Info hours opening'));
        $form->text('info_hours_closing', __('Info hours closing'));

        return $form;
    }
}
