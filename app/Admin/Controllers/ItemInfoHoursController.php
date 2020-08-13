<?php

namespace App\Admin\Controllers;

use App\ItemInfoHours;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ItemInfoHoursController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Informacion de horarios';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ItemInfoHours());

        $grid->column('info_hours_id', __('Info hours id'));
        $grid->column('work_days_description', __('Descripción de los días que trabaja'));
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
        $show = new Show(ItemInfoHours::findOrFail($id));

        $show->field('info_hours_id', __('Info hours id'));
        $show->field('work_days_description', __('Work days description'));
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
        $form = new Form(new ItemInfoHours());
        $form->hidden('info_hours_id');
        $form->text('work_days_description', __('Work days description'));

        $form->saving(function (Form $form) {
            $form->info_hours_id = Str::lower(str_replace(" ", "-", $form->work_days_description));
        });

        return $form;
    }
}
