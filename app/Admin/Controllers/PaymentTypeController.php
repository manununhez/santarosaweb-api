<?php

namespace App\Admin\Controllers;

use Illuminate\Support\Str;

use App\PaymentType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PaymentTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Tipos de pago';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PaymentType());

        $grid->column('payment_type_id', __('Payment type id'));
        $grid->column('name', __('Nombre'));
        $grid->column('description', __('Descripción'));
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
        $show = new Show(PaymentType::findOrFail($id));

        $show->field('payment_type_id', __('Payment type id'));
        $show->field('name', __('Nombre'));
        $show->field('description', __('Descripción'));
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
        $form = new Form(new PaymentType());

        $form->hidden('payment_type_id');
        $form->text('name', __('Nombre'))->placeholder('Nombre')->required();
        $form->textarea('description', __('Descripción'))->placeholder('Breve descripción');

        $form->saving(function (Form $form) {
            $form->payment_type_id = Str::lower(str_replace(" ", "-", $form->name));
        });

        return $form;
    }
}
