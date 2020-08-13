<?php

namespace App\Admin\Controllers;

use App\ItemPaymentType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ItemPaymentTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Tipos de pago de una sub-categoria';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ItemPaymentType());

        $grid->column('id', __('Id'));
        $grid->column('item_category_id', __('Item category id'));
        $grid->column('payment_type_id', __('Payment type id'));
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
        $show = new Show(ItemPaymentType::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('item_category_id', __('Item category id'));
        $show->field('payment_type_id', __('Payment type id'));
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
        $form = new Form(new ItemPaymentType());

        // $form->text('item_category_id', __('Item category id'));
        // $form->text('payment_type_id', __('Payment type id'));

        $form->select('item_category_id',__('Seleccionar la seccion'))->options(ItemCategory::all()->pluck('name', 'item_category_id'));
        $form->select('payment_type_id', __('Seleccionar la categoria'))->options(PaymentType::all()->pluck('name', 'payment_type_id'));

        return $form;
    }
}
